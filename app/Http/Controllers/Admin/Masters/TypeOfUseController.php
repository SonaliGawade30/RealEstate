<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreTypeOfUseRequest;
use App\Http\Requests\Admin\Masters\UpdateTypeOfUseRequest;
use App\Models\TypeOfUse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TypeOfUseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_of_use = TypeOfUse::latest()->get();

        return view('admin.masters.type-of-use')->with(['type_of_use'=> $type_of_use]);
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
    public function store(StoreTypeOfUseRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            TypeOfUse::create( Arr::only( $input, TypeOfUse::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Type of Use created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'TypeOfUse');
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
    public function edit(TypeOfUse $TypeOfUse)
    {
        if ($TypeOfUse)
        {
            $response = [
                'result' => 1,
                'TypeOfUse' => $TypeOfUse,
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
    public function update(UpdateTypeOfUseRequest $request, TypeOfUse $TypeOfUse)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $input['type_of_use'] = $input['edit_type_of_use'];
            $TypeOfUse->update( Arr::only( $input, TypeOfUse::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Type Of Use updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Type Of Use');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeOfUse $TypeOfUse)
    {
        try
        {
            DB::beginTransaction();
            $TypeOfUse->delete();
            DB::commit();
            return response()->json(['success'=> 'Type Of Use deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'TypeOfUse');
        }
    }
}
