<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\StorePropertyRegistrationRequest;
use App\Http\Requests\Admin\UpdatePropertyRegistrationRequest;
use App\Models\{PropertyRegistration,Zone,PropertyType,TypeOfUse,Source,Estate,PropertyUnit};
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Repositories\PropertyRegistrationRepository;
use Exception;


class PropertyRegistrationController extends Controller
{
    protected $propertyregistrationRepository;
    public function __construct()
    {
        $this->propertyregistrationRepository = new PropertyRegistrationRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $property_registration = PropertyRegistration::with('zone','source')->latest()->get();
        return view('admin.property-registration')->with(['property_registration'=> $property_registration]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $zones = Zone::latest()->get();
        $property_types = PropertyType::latest()->get();
        $type_of_use = TypeOfUse::latest()->get();
        $sources = Source::latest()->get();
        $estates = Estate::latest()->get();
        return view('admin.add-property-registration')->with(['zones'=> $zones, 'property_types'=> $property_types,'type_of_use'=> $type_of_use,'sources'=> $sources,'estates'=>$estates ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRegistrationRequest $request)
    {
        try
        {
            $this->propertyregistrationRepository->storeProperty($request,$request->validated());
            return response()->json(['success'=> 'Property Register successfully!']);
        }
        catch(Exception $e)
        {
            return $this->respondWithAjax($e, 'adding', 'Property');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PropertyRegistration $PropertyRegistration)
    {
        return $this->propertyregistrationRepository->editProperty($PropertyRegistration);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRegistrationRequest $request, PropertyRegistration $PropertyRegistration)
    {
        try
        {
            $this->propertyregistrationRepository->updateProperty($request,$request->validated(), $PropertyRegistration);
            return response()->json(['success'=> 'Property updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Property');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyRegistration $PropertyRegistration)
    {
        try
        {
            DB::beginTransaction();
            $PropertyRegistration->delete();
            $PropertyRegistration->propertyUnit()->delete();
            DB::commit();
            return response()->json(['success'=> 'Property deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'PropertyRegistration');
        }
    }

    public function deleteRow($id)
    {
        try
        {
            DB::beginTransaction();
            $propertyUnit = PropertyUnit::whereId($id)->first();
            $filePath = public_path('storage/' . $propertyUnit->document);
            if (File::exists($filePath)) {
                unlink($filePath);
            }
            $propertyUnit->delete();

            DB::commit();
            return response()->json(['success'=> 'Row deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'PropertyRegistration');
        }
    }

}
