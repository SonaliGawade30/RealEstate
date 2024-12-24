<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreSourceRequest;
use App\Http\Requests\Admin\Masters\UpdateSourceRequest;
use App\Models\Source;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sources = Source::latest()->get();

        return view('admin.masters.sources')->with(['sources'=> $sources]);
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
    public function store(StoreSourceRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            Source::create( Arr::only( $input, Source::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Source created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Source');
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
    public function edit(Source $source)
    {
        if ($source)
        {
            $response = [
                'result' => 1,
                'source' => $source,
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
    public function update(UpdateSourceRequest $request, Source $source)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $input['name'] = $input['edit_name'];
            $source->update( Arr::only( $input, Source::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Source updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Source');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Source $source)
    {
        try
        {
            DB::beginTransaction();
            $source->delete();
            DB::commit();
            return response()->json(['success'=> 'Source deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Source');
        }
    }
}
