<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\User;
use App\Http\Models\Choice;
use App\Http\Models\Criteria;
use Auth;
use DB;

class ResultStep1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

            $i = 0;
            $j = 0;

            $percentages = Choice::select('criterias.name', 'criterias.description', DB::raw('sum(choice.option)/count(choice.option)*100 as result'))
                                    ->join('criterias','criterias.id','=','choice.criteria_id')
                                    ->where('suggestion', '=', '0')
                                    ->groupBy('criterias.id')->get();

            $data_suggestion = Choice::with('criteria', 'user')
                                        ->where('suggestion', '=', '1')
                                        ->get();
                                    // return compact('percentages', 'data_suggestion', 'i');

            return view('result_step1.index', compact('percentages', 'data_suggestion', 'i', 'j'));
    }
}
