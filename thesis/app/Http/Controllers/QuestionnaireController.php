<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\User;
use App\Http\Models\Choice;
use App\Http\Models\Criteria;
use Auth;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $data = Choice::where('user_id', '=', $user->id)->first();

        if ($user->id == 1) {
            return redirect()->route('questionnaire.create')
                             ->with('failed','Maaf, peneliti tidak perlu mengisi kuesioner ini.');
        }

        if ($data == null) {
            return redirect()->route('questionnaire.create');
        } else {
            $i = 0;
            $j = 0;

            $data_standart = Choice::with('criteria')
                                ->where('suggestion', '=', '0')
                                ->where('user_id', '=', $user->id)
                                ->get();

            $data_suggestion = Choice::with('criteria')
                                    ->where('suggestion', '=', '1')
                                    ->where('user_id', '=', $user->id)
                                    ->get();

            return view('questionnaire.index', compact('data_standart', 'data_suggestion', 'i', 'j'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $i = 0;
        $criteria = Criteria::select('*')
                                ->whereNotIn('id', function($query){
                                    $query->select('criteria_id')
                                    ->from(with(new Choice)->getTable())
                                    ->where('suggestion', 1);
                                })
                                ->where('description','<>','null')
                                ->orderBy('id','DESC')->get();
                                
        return view('questionnaire.create',compact('criteria', 'i'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // criteria_id dari input
        // value option dari input
        // user_id dari auth 
        // suggestion baku 0
        
        // suggestion non baku 1
        // option default 1

    }
}
