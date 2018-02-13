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
        $role_id = Auth::user()->roleId();
        $user = User::find(Auth::user()->id);
        $data = Choice::where('user_id', '=', $user->id)->first();

        if ($role_id == 3 || $role_id == 4 || $role_id == 5 ||$role_id == 6) { 
            if ($user->id == 1) {
                $percentages = Choice::select('criterias.name', 'criterias.description',  
                                        DB::raw('sum(choice.option) as sum'), DB::raw('count(choice.option) as count'), 
                                        DB::raw('sum(choice.option)/count(choice.option)*100 as result'))
                                        ->join('criterias','criterias.id','=','choice.criteria_id')
                                        ->where('choice.suggestion', '=', '0')
                                        ->where('criterias.step', '=', '1')
                                        ->where('criterias.status', '=', '1')
                                        ->groupBy('criterias.id')
                                        ->orderBy('criterias.id','DESC')
                                        ->paginate(5);

                $data_suggestion = User::select('choice.*', 'criterias.*', 'users.name AS user_name')
                                            ->join('choice','choice.user_id','=','users.id')
                                            ->join('criterias','criterias.id','=','choice.criteria_id')
                                            ->where('choice.suggestion', '=', '1')
                                            ->where('criterias.step', '=', '2')
                                            ->where('criterias.status', '=', '1')
                                            ->orderBy('criterias.id','DESC')
                                            ->paginate(5);

                return view('result_step1.index', compact('percentages', 'data_suggestion'))
                    ->with('i', ($request->input('page', 1) - 1) * 5)
                    ->with('j', ($request->input('page', 1) - 1) * 5);
            }

            if ($data == null) {
                return redirect()->route('questionnaire.create')
                                ->with('failed','Maaf, silahkan isi kuesioner kriteria dahulu.');
            } else {
                $percentages = Choice::select('criterias.name', 'criterias.description',  
                                        DB::raw('sum(choice.option) as sum'), DB::raw('count(choice.option) as count'), 
                                        DB::raw('sum(choice.option)/count(choice.option)*100 as result'))
                                        ->join('criterias','criterias.id','=','choice.criteria_id')
                                        ->where('choice.suggestion', '=', '0')
                                        ->where('criterias.step', '=', '1')
                                        ->where('criterias.status', '=', '1')
                                        ->groupBy('criterias.id')
                                        ->orderBy('criterias.id','DESC')
                                        ->paginate(5);

                $data_suggestion = User::select('choice.*', 'criterias.*', 'users.name AS user_name')
                                            ->join('choice','choice.user_id','=','users.id')
                                            ->join('criterias','criterias.id','=','choice.criteria_id')
                                            ->where('choice.suggestion', '=', '1')
                                            ->where('criterias.step', '=', '2')
                                            ->where('criterias.status', '=', '1')
                                            ->orderBy('criterias.id','DESC')
                                            ->paginate(5);

                return view('result_step1.index', compact('percentages', 'data_suggestion'))
                    ->with('i', ($request->input('page', 1) - 1) * 5)
                    ->with('j', ($request->input('page', 1) - 1) * 5);
            }
        } else {
            return redirect()->route('profile_users.show');
        }
    }
}
