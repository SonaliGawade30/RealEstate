<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\StoreZoneRequest;
use App\Http\Requests\Admin\Masters\UpdateZoneRequest;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zones = Zone::latest()->get();

        return view('admin.masters.zones')->with(['zones'=> $zones]);
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
    public function store(StoreZoneRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            Zone::create( Arr::only( $input, Zone::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Zone created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Zone');
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
    public function edit(Zone $zone)
    {
        if ($zone)
        {
            $response = [
                'result' => 1,
                'zone' => $zone,
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
    public function update(UpdateZoneRequest $request, Zone $zone)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $input['name'] = $input['edit_name'];
            $zone->update( Arr::only( $input, Zone::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Zone updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Zone');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zone $zone)
    {
        try
        {
            DB::beginTransaction();
            $zone->delete();
            DB::commit();
            return response()->json(['success'=> 'Zone deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Zone');
        }

    }
}
