<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\StorePartyRegistrationRequest;
use App\Http\Requests\Admin\UpdatePartyRegistrationRequest;
use App\Models\PartyRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Repositories\PartyRegistrationRepository;
use Exception;


class PartyRegistrationController extends Controller
{
    protected $partyregistrationRepository;
    public function __construct()
    {
        $this->partyregistrationRepository = new PartyRegistrationRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $party_registration = PartyRegistration::latest()->get();
        return view('admin.party-registration')->with(['party_registration'=> $party_registration]);
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
    public function store(StorePartyRegistrationRequest $request)
    {
        try
        {
            $this->partyregistrationRepository->storeParty($request->validated());
            return response()->json(['success'=> 'Party Register successfully!']);
        }
        catch(Exception $e)
        {
            return $this->respondWithAjax($e, 'adding', 'Party');
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
    public function edit(PartyRegistration $PartyRegistration)
    {
        return $this->partyregistrationRepository->editParty($PartyRegistration);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartyRegistrationRequest $request, PartyRegistration $PartyRegistration)
    {
        try
        {
            $this->partyregistrationRepository->updateParty($request->validated(), $PartyRegistration);
            return response()->json(['success'=> 'Party updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Party');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PartyRegistration $PartyRegistration)
    {
        try
        {
            DB::beginTransaction();
            $PartyRegistration->delete();
            DB::commit();
            return response()->json(['success'=> 'Party deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Party');
        }
    }
}
