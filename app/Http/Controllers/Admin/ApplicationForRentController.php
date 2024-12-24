<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\StoreApplicationForRentRequest;
use App\Http\Requests\Admin\UpdateApplicationForRentRequest;
use App\Models\{ApplicationForRent,Zone,PartyRegistration,PropertyRegistration,PropertyUnit};
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\ApplicationForRentRepository;


class ApplicationForRentController extends Controller
{
    protected $applicationforrentRepository;
    public function __construct()
    {
        $this->applicationforrentRepository = new ApplicationForRentRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zones = Zone::latest()->get();
        $partys = PartyRegistration::latest()->get();
        $propertys = PropertyRegistration::latest()->get();
        $applications = ApplicationForRent::latest()->get();
        return view('admin.application-for-rents')->with(['applications'=> $applications, 'zones'=> $zones,'partys'=> $partys,'propertys'=> $propertys]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $zones = Zone::latest()->get();
        // return view('admin.application-for-rent')->with(['zones'=> $zones ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationForRentRequest $request)
    {
        try
        {
            $this->applicationforrentRepository->storeApplicationForRent($request->validated());
            return response()->json(['success'=> 'Application Created successfully!']);
        }
        catch(Exception $e)
        {
            return $this->respondWithAjax($e, 'adding', 'Application');
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
    public function edit(ApplicationForRent $application_for_rent)
    {
        return $this->applicationforrentRepository->editApplicationForRent($application_for_rent);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationForRentRequest $request, ApplicationForRent $application_for_rent)
    {
        try
        {
            $this->applicationforrentRepository->updateApplicationForRent($request->validated(), $application_for_rent);
            return response()->json(['success'=> 'Application updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Application');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApplicationForRent $application_for_rent)
    {
        try
        {
            DB::beginTransaction();
            $application_for_rent->delete();
            $application_for_rent->document()->delete();
            DB::commit();
            return response()->json(['success'=> 'Application deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Application');
        }
    }

    public function getUnits($id)
    {
        $units = PropertyUnit::wherePropertyRegId($id)->latest()->get();

        if ($units)
        {
            $unitsHtml = '<span>
                <option value="">--Select Unit No--</option>';
                foreach($units as $unit):
                    $unitsHtml .= '<option value="'.$unit->id.'" >'.$unit->unit_no.'</option>';
                endforeach;
            $unitsHtml .= '</span>';

            $response = [
                'result' => 1,
                'unitsHtml' => $unitsHtml,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }

    public function getPartyDetails($party_id)
    {
        $party = PartyRegistration::whereId($party_id)->latest()->first();

        if ($party)
        {
            $response = [
                'result' => 1,
                'party' => $party,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;

    }
}
