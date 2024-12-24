<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\StoreReligionRequest;
use App\Http\Requests\Admin\Masters\UpdateReligionRequest;
use App\Models\Religion;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



class ReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $religions = Religion::latest()->get();

        return view('admin.masters.religions')->with(['religions'=> $religions]);
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
    public function store(StoreReligionRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            Religion::create( Arr::only( $input, Religion::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Religion created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Religion');
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
    public function edit(Religion $religion)
    {
        if ($religion)
        {
            $response = [
                'result' => 1,
                'religion' => $religion,
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
    public function update(UpdateReligionRequest $request, Religion $religion)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $input['name'] = $input['edit_name'];
            $religion->update( Arr::only( $input, Religion::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Religion updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Religion');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Religion $religion)
    {
        try
        {
            DB::beginTransaction();
            $religion->delete();
            DB::commit();
            return response()->json(['success'=> 'Religion deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Religion');
        }

    }
}
