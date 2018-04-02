<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\User;
use App\Http\Models\Choice;
use App\Http\Models\Criteria;
use App\Http\Models\ResultSelection;
use App\Http\Models\PairwiseComparison;
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
                $i = 0;
                $j = 0;
                $k = 0;
                
                $data_fix = Choice::select('choice.*', 'criterias.*')
                                    ->join('criterias','criterias.id','=','choice.criteria_id')
                                    ->where('choice.suggestion', '=', '0')
                                    ->where('criterias.step', '=', '2')
                                    ->where('criterias.status', '=', '1')
                                    ->orderBy('criterias.id','DESC')
                                    ->get();

                $criteriaCheck = Criteria::select('criterias.ref_id')
                                            ->where('criterias.ref_id','<>',null)
                                            ->where('criterias.step','=', '2')
                                            ->get();
                $usedCriteria = array();

                foreach ($criteriaCheck as $used){
                    if ($used["ref_id"] != null) {
                        $usedCriteria[] = $used["ref_id"];
                    }
                }
                
                $data_standart = Choice::select('choice.*', 'criterias.*',   
                                            DB::raw('sum(choice.option) as sum'), DB::raw('count(choice.option) as count'), 
                                            DB::raw('sum(choice.option)/count(choice.option)*100 as result'))
                                            ->join('criterias','criterias.id','=','choice.criteria_id')
                                            ->where('choice.suggestion', '=', '0')
                                            ->where('criterias.step', '=', '1')
                                            ->where('criterias.status', '=', '1')
                                            ->whereNotIn('criterias.id', $usedCriteria)
                                            ->groupBy('criterias.id')
                                            ->orderBy('criterias.id','DESC')
                                            ->get();

                $data_suggestion = User::select('choice.*', 'criterias.*', 'users.name AS user_name')
                                            ->join('choice','choice.user_id','=','users.id')
                                            ->join('criterias','criterias.id','=','choice.criteria_id')
                                            ->where('choice.suggestion', '=', '1')
                                            ->where('criterias.step', '=', '2')
                                            ->where('criterias.status', '=', '1')
                                            ->whereNotIn('criterias.id', $usedCriteria)
                                            ->orderBy('criterias.id','ASC')
                                            ->get();

                return view('criteria_step2.index', compact('data_standart', 'data_suggestion', 'data_fix', 'i', 'j', 'k'));
            }

            if ($data == null) {
                return redirect()->route('questionnaire.create')
                                ->with('failed','Maaf, silahkan isi kuesioner kriteria dahulu.');
            } else {
                $i = 0;
                $j = 0;
                $k = 0;

                $data_fix = Choice::select('choice.*', 'criterias.*')
                                    ->join('criterias','criterias.id','=','choice.criteria_id')
                                    ->where('choice.suggestion', '=', '0')
                                    ->where('criterias.step', '=', '2')
                                    ->where('criterias.status', '=', '1')
                                    ->orderBy('criterias.id','DESC')
                                    ->get();

                $criteriaCheck = Criteria::select('criterias.ref_id')
                                            ->where('criterias.ref_id','<>',null)
                                            ->where('criterias.step','=', '2')
                                            ->get();
                $usedCriteria = array();

                foreach ($criteriaCheck as $used){
                    if ($used["ref_id"] != null) {
                        $usedCriteria[] = $used["ref_id"];
                    }
                }
                
                $data_standart = Choice::select('choice.*', 'criterias.*',   
                                            DB::raw('sum(choice.option) as sum'), DB::raw('count(choice.option) as count'), 
                                            DB::raw('sum(choice.option)/count(choice.option)*100 as result'))
                                            ->join('criterias','criterias.id','=','choice.criteria_id')
                                            ->where('choice.suggestion', '=', '0')
                                            ->where('criterias.step', '=', '1')
                                            ->where('criterias.status', '=', '1')
                                            ->whereNotIn('criterias.id', $usedCriteria)
                                            ->groupBy('criterias.id')
                                            ->orderBy('criterias.id','DESC')
                                            ->get();

                $data_suggestion = User::select('choice.*', 'criterias.*', 'users.name AS user_name')
                                            ->join('choice','choice.user_id','=','users.id')
                                            ->join('criterias','criterias.id','=','choice.criteria_id')
                                            ->where('choice.suggestion', '=', '1')
                                            ->where('criterias.step', '=', '2')
                                            ->where('criterias.status', '=', '1')
                                            ->whereNotIn('criterias.id', $usedCriteria)
                                            ->orderBy('criterias.id','ASC')
                                            ->get();

                return view('criteria_step2.index', compact('data_standart', 'data_suggestion', 'data_fix', 'i', 'j', 'k'));
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
        $result = ResultSelection::where('criteria_id', '=', $id)->first();
        $pairwise = PairwiseComparison::where('criteria1_id', '=', $id)->first();

        if ($pairwise == null && $result == null) {
            Choice::join('criterias','criterias.id','=','choice.criteria_id')
                ->where('choice.criteria_id', '=', $id)
                ->delete();
                
            Criteria::find($id)->delete();

            return redirect()->route('criteriastep2.index')
                             ->with('success','Kriteria berhasil dihapus');
        } else {
            return redirect()->route('criteriastep2.index')
                             ->with('failed','Kriteria tidak bisa dihapus karena sudah ada penilaian');
        }
        
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
        $input["ref_id"] = $data["id"];
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
