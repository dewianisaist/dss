<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\User;
use App\Http\Models\Choice;
use App\Http\Models\Criteria;
use Auth;
use DB;

class CriteriaStep2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_id = Auth::user()->roleId();
        $user = User::find(Auth::user()->id);
        $data = Choice::where('user_id', '=', $user->id)->first();

        if ($role_id == 3 || $role_id == 4 || $role_id == 5 ||$role_id == 6) { 
            if ($user->id == 1) {
                $i = 0;
                $j = 0;

                $data_standart = Choice::select('criterias.*', 'choice.*',  
                                        DB::raw('sum(choice.option) as sum'), DB::raw('count(choice.option) as count'), 
                                        DB::raw('sum(choice.option)/count(choice.option)*100 as result'))
                                        ->join('criterias','criterias.id','=','choice.criteria_id')
                                        ->where('suggestion', '=', '0')
                                        ->groupBy('criterias.id')->get();

                $data_suggestion = Choice::with('criteria', 'user')
                                            ->where('suggestion', '=', '1')
                                            ->get();

                return view('criteria_step2.index', compact('data_standart', 'data_suggestion', 'i', 'j'));
            }

            if ($data == null) {
                return redirect()->route('questionnaire.create')
                                ->with('failed','Maaf, silahkan isi kuesioner kriteria dahulu.');
            } else {
                $i = 0;
                $j = 0;

                $data_standart = Choice::select('criterias.*', 'choice.*',  
                                        DB::raw('sum(choice.option) as sum'), DB::raw('count(choice.option) as count'), 
                                        DB::raw('sum(choice.option)/count(choice.option)*100 as result'))
                                        ->join('criterias','criterias.id','=','choice.criteria_id')
                                        ->where('suggestion', '=', '0')
                                        ->groupBy('criterias.id')->get();

                $data_suggestion = Choice::with('criteria', 'user')
                                            ->where('suggestion', '=', '1')
                                            ->get();

                return view('criteria_step2.index', compact('data_standart', 'data_suggestion', 'i', 'j'));
            }
        } else {
            return redirect()->route('profile_users.show');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_standart($id)
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
    public function update_standart(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_standart($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_suggest($id)
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
    public function update_suggest(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_suggest($id)
    {
        //
    }

}
