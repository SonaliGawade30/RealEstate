<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreBilingTypeRequest;
use App\Http\Requests\Admin\Masters\UpdateBilingTypeRequest;
use App\Models\BilingType;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BilingTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $biling_types = BilingType::latest()->get();

        return view('admin.masters.biling-types')->with(['biling_types'=> $biling_types]);
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
    public function store(StoreBilingTypeRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            BilingType::create( Arr::only( $input, BilingType::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Biling Type created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'BilingType');
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
    public function edit(BilingType $BilingType)
    {
        if ($BilingType)
        {
            $response = [
                'result' => 1,
                'BilingType' => $BilingType,
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
    public function update(UpdateBilingTypeRequest $request, BilingType $BilingType)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $input['type'] = $input['edit_type'];
            $BilingType->update( Arr::only( $input, BilingType::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Biling Type updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Biling Type');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BilingType $BilingType)
    {
        try
        {
            DB::beginTransaction();
            $BilingType->delete();
            DB::commit();
            return response()->json(['success'=> 'Biling Type deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'BilingType');
        }
    }
}
