<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StorePropertyTypeRequest;
use App\Http\Requests\Admin\Masters\UpdatePropertyTypeRequest;
use App\Models\PropertyType;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $property_types = PropertyType::latest()->get();

        return view('admin.masters.property-type')->with(['property_types'=> $property_types]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyTypeRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            PropertyType::create( Arr::only( $input, PropertyType::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Property Type created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Property Type');
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
    public function edit(PropertyType $PropertyType)
    {
        if ($PropertyType)
        {
            $response = [
                'result' => 1,
                'PropertyType' => $PropertyType,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyTypeRequest $request, PropertyType $PropertyType)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $input['property_name'] = $input['edit_property_name'];
            $PropertyType->update( Arr::only( $input, PropertyType::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Property Type updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Property Type');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyType $PropertyType)
    {
        try
        {
            DB::beginTransaction();
            $PropertyType->delete();
            DB::commit();
            return response()->json(['success'=> 'Property Type deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'PropertyType');
        }
    }
}
