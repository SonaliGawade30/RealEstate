<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreRuleRequest;
use App\Http\Requests\Admin\Masters\UpdateRuleRequest;
use App\Models\Rule;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rules = Rule::latest()->get();

        return view('admin.masters.rules')->with(['rules'=> $rules]);
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
    public function store(StoreRuleRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            Rule::create( Arr::only( $input, Rule::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Rule created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Rule');
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
    public function edit(Rule $Rule)
    {
        if ($Rule)
        {
            $response = [
                'result' => 1,
                'Rule' => $Rule,
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
    public function update(UpdateRuleRequest $request, Rule $Rule)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $input['rule_name'] = $input['edit_rule_name'];
            $Rule->update( Arr::only( $input, Rule::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Rule updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Rule');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rule $rule)
    {
        try
        {
            DB::beginTransaction();
            $rule->delete();
            DB::commit();
            return response()->json(['success'=> 'Rule  deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Source');
        }
    }
}
