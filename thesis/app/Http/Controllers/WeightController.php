<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Criteria;
use App\Http\Models\Choice;
use App\Http\Models\PairwiseComparison;
use Auth;

class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_id = Auth::user()->roleId();

        if ($role_id == 3) {
            $i = 0;
            $criterias = Criteria::where('step', '=', '2')
                                    ->where('status', '=', '1')
                                    ->where('group_criteria', '=', null)
                                    ->whereNotIn('id', function($query){
                                        $query->select('criteria_id')
                                        ->from(with(new Choice)->getTable())
                                        ->where('suggestion', 1);
                                    })
                                    ->get();

            $criterias_group = array();
            $total_criterias = 0;

            foreach ($criterias as $criteria){
                $criterias_group[$criteria->id]["group"] = $criteria;
                $criterias_group[$criteria->id]["data"] = array();

                $subcriterias = Criteria::where('step', '=', '2')
                                            ->where('status', '=', '1')
                                            ->where('group_criteria', '=', $criteria->id)
                                            ->whereNotIn('id', function($query){
                                                $query->select('criteria_id')
                                                ->from(with(new Choice)->getTable())
                                                ->where('suggestion', 1);
                                            })
                                            ->orderBy('id','DESC')
                                            ->get();

                foreach ($subcriterias as $subcriteria){
                    $criterias_group[$criteria->id]["data"][] = $subcriteria;
                }
            }
            
            // return $criterias_group;
            return view('weights.index',compact('criterias_group', 'i'));
        } else {
            return redirect()->route('profile_users.show');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $i = 0;
        $requestedId = null;
        if ($id > 0) {
            $requestedId = $id;
        }
        $criterias = Criteria::where('step', '=', '2')
                                ->where('status', '=', '1')
                                ->where('group_criteria', '=', $requestedId)
                                ->whereNotIn('id', function($query){
                                    $query->select('criteria_id')
                                    ->from(with(new Choice)->getTable())
                                    ->where('suggestion', 1);
                                })
                                ->orderBy('id','DESC')
                                ->get();

        $compares = array();
        foreach ($criterias as $criteria1) {
            foreach ($criterias as $criteria2) {
                if (!array_key_exists($criteria1->id.":".$criteria2->id,$compares) && !array_key_exists($criteria2->id.":".$criteria1->id,$compares) && $criteria1->id != $criteria2->id){
                    $data = array();
                    $data[] = $criteria1;
                    $data[] = $criteria2;
                    $compares[$criteria1->id.":".$criteria2->id] = array();
                    $compares[$criteria1->id.":".$criteria2->id]['criteria'] = $data;
                    $pairwises = PairwiseComparison::where(function($q) use ($criteria1, $criteria2) {
                        $q->where(function($query) use ($criteria1, $criteria2){
                                $query->where('criteria1_id','=', $criteria1->id)
                                      ->where('criteria2_id', $criteria2->id);
                            })
                          ->orWhere(function($query) use ($criteria1, $criteria2) {
                                $query->where('criteria1_id', $criteria2->id)
                                      ->where('criteria2_id', $criteria1->id);
                            });
                        })
                        ->get();
                    $value = 0;
                    $selected_criteria = $criteria1->id;
                    foreach ($pairwises as $pairwise){
                        if ($pairwise->value > $value ){
                            $value = $pairwise->value;
                            $selected_criteria = $pairwise->criteria1_id;
                        }
                    }
                    $compares[$criteria1->id.":".$criteria2->id]['value'] = $value;
                    $compares[$criteria1->id.":".$criteria2->id]['selected_criteria'] = $selected_criteria;
                    $compares[$criteria1->id.":".$criteria2->id]['pairwise'] = $pairwises;
                }
            }
        }
        // return $compares;
        return view('weights.pairwise',compact('compares', 'id','i'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $i = 0;
        $requestedId = null;
        if ($id > 0) {
            $requestedId = $id;
        }
        $input = $request->all();
        
        $criterias = Criteria::where('step', '=', '2')
                                ->where('status', '=', '1')
                                ->where('group_criteria', '=', $requestedId)
                                ->whereNotIn('id', function($query){
                                    $query->select('criteria_id')
                                    ->from(with(new Choice)->getTable())
                                    ->where('suggestion', 1);
                                })
                                ->orderBy('id','DESC')
                                ->get();

        $pairwises = array();
        $count = 0;
        // criteria_id: {
        //     90:89: "89",
        //     90:73: "73",
        //     89:73: "73"
        //     },
        //     value: {
        //     90:89: "5.000",
        //     90:73: "4.000",
        //     89:73: "1.000"
        //     }
        foreach ($criterias as $criteria1) {
            foreach ($criterias as $criteria2) {
                $data = array();
                $data["criteriaid_1"] = $criteria1->id;
                $data["criteriaid_2"] = $criteria2->id;
                if ($criteria1->id == $criteria2->id){
                    $data["value"] = 1;
                }
                elseif (array_key_exists($criteria1->id.":".$criteria2->id,$input["criteria_id"])){
                    $selected_id = $input["criteria_id"][$criteria1->id.":".$criteria2->id];
                    if ($selected_id == $criteria1->id){
                        $data["value"] = $input["value"][$criteria1->id.":".$criteria2->id];
                    }else{
                        $data["value"] = 1 / $input["value"][$criteria1->id.":".$criteria2->id];
                    }
                }elseif (array_key_exists($criteria2->id.":".$criteria1->id,$input["criteria_id"])){
                    $selected_id = $input["criteria_id"][$criteria2->id.":".$criteria1->id];
                    if ($selected_id == $criteria1->id){
                        $data["value"] = $input["value"][$criteria2->id.":".$criteria1->id];
                    }else{
                        $data["value"] = 1 / $input["value"][$criteria2->id.":".$criteria1->id];
                    }
                }
                $pairwises[] = $data;
            }
        }

        $base_table = array();
        foreach ($pairwises as $pairwise){
            if (!array_key_exists($pairwise["criteriaid_1"],$base_table)){
                $base_table[$pairwise["criteriaid_1"]] = array();
            }
            $base_table[$pairwise["criteriaid_1"]][$pairwise["criteriaid_2"]] = $pairwise["value"];
        }
        return $base_table;
        return $pairwises;
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
