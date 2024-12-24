<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\StoreApplicationForRentalPropertyRequest;
use App\Http\Requests\Admin\UpdateApplicationForRentalPropertyRequest;
use App\Models\{ApplicationForRentalProperty,Zone,PartyRegistration,PropertyRegistration,Religion,Rule,BilingType};
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
// use App\Repositories\ApplicationForRentRepository;

class ApplicationForRentalPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zones = Zone::latest()->get();
        $partys = PartyRegistration::latest()->get();
        $propertys = PropertyRegistration::latest()->get();
        $castes = Religion::latest()->get();
        $rules = Rule::latest()->get();
        $biling_types = BilingType::latest()->get();
        $applications = ApplicationForRentalProperty::latest()->get();
        
        return view('admin.application-for-rental-properties')->with(['applications'=> $applications,'zones'=> $zones,'partys'=> $partys,'propertys'=> $propertys,
        'castes'=> $castes ,'rules'=> $rules, 'biling_types'=> $biling_types]);
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
    public function store(StoreApplicationForRentalPropertyRequest $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
