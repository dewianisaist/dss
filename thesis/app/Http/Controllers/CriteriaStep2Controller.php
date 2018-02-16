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
    public function index(Request $request)
    {
        $role_id = Auth::user()->roleId();
        $user = User::find(Auth::user()->id);
        $data = Choice::where('user_id', '=', $user->id)->first();

        if ($role_id == 3 || $role_id == 4 || $role_id == 5 ||$role_id == 6) { 
            if ($user->id == 1) {
                $data_standart = Choice::select('choice.*', 'criterias.*',  
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
                                            ->orderBy('criterias.id','ASC')
                                            ->paginate(5);

                $data_fix = Choice::select('choice.*', 'criterias.*')
                                    ->join('criterias','criterias.id','=','choice.criteria_id')
                                    ->where('choice.suggestion', '=', '0')
                                    ->where('criterias.step', '=', '2')
                                    ->where('criterias.status', '=', '1')
                                    ->orderBy('criterias.id','DESC')
                                    ->paginate(5);

                return view('criteria_step2.index', compact('data_standart', 'data_suggestion', 'data_fix'))
                    ->with('i', ($request->input('page', 1) - 1) * 5)
                    ->with('j', ($request->input('page', 1) - 1) * 5)
                    ->with('k', ($request->input('page', 1) - 1) * 5);
            }

            if ($data == null) {
                return redirect()->route('questionnaire.create')
                                ->with('failed','Maaf, silahkan isi kuesioner kriteria dahulu.');
            } else {
                $data_standart = Choice::select('choice.*', 'criterias.*',   
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
                                            ->orderBy('criterias.id','ASC')
                                            ->paginate(5);

                $data_fix = Choice::select('choice.*', 'criterias.*')
                                    ->join('criterias','criterias.id','=','choice.criteria_id')
                                    ->where('choice.suggestion', '=', '0')
                                    ->where('criterias.step', '=', '2')
                                    ->where('criterias.status', '=', '1')
                                    ->orderBy('criterias.id','DESC')
                                    ->paginate(5);

                return view('criteria_step2.index', compact('data_standart', 'data_suggestion', 'data_fix'))
                    ->with('i', ($request->input('page', 1) - 1) * 5)
                    ->with('j', ($request->input('page', 1) - 1) * 5)
                    ->with('k', ($request->input('page', 1) - 1) * 5);
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
        return view('criteria_step2.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
           ]);
        
        $input = $request->all();
        $input["step"] = 2;
        $input["status"] = 1;
        $criteria = Criteria::create($input);

        $user = User::find(Auth::user()->id);

        $choice["user_id"] = $user->id;
        $choice["criteria_id"] = $criteria->id;
        $choice["option"] = 1;
        $choice["suggestion"] = 0;
        Choice::create($choice);

        return redirect()->route('criteriastep2.index')
                         ->with('success','Kriteria berhasil dibuat');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $criteria = Criteria::find($id);

        return view('criteria_step2.edit',compact('criteria'));
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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
 
        Criteria::find($id)->update($request->all());
 
        return redirect()->route('criteriastep2.index')
                         ->with('success','Kriteria berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Choice::join('criterias','criterias.id','=','choice.criteria_id')
                ->where('choice.criteria_id', '=', $id)
                ->delete();
                
        Criteria::find($id)->delete();

        return redirect()->route('criteriastep2.index')
                        ->with('success','Kriteria berhasil dihapus');
    }

    /**
     * Use the specified resource from storage. And store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function use(Request $request, $id)
    {

        $data = Choice::join('criterias','criterias.id','=','choice.criteria_id')
                            ->where('choice.criteria_id', '=', $id)
                            ->first();

        $input['name'] = $data['name'];
        $input['description'] = $data['description'];
        $input["step"] = 2;
        $input["status"] = 1;
        $criteria = Criteria::create($input);

        $user = User::find(Auth::user()->id);

        $choice["user_id"] = $user->id;
        $choice["criteria_id"] = $criteria->id;
        $choice["option"] = 1;
        $choice["suggestion"] = 0;
        Choice::create($choice);

        return redirect()->route('criteriastep2.index')
                         ->with('success','Kriteria berhasil digunakan');
    }
}
