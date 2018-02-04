<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\User;
use App\Http\Models\Choice;
use App\Http\Models\Criteria;
use Auth;
use DB;

class CriteriaGroupController extends Controller
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
                $criteria_group = DB::table('criterias AS cr')
                                    ->select(DB::raw('cr.id, cr.name, cr.description, (select name from criterias where id = (select group_criteria from criterias as cri where cri.id = cr.id)) AS group_name'))
                                    ->where('cr.status','=','1')
                                    ->orderBy('cr.id','DESC')
                                    ->get();

                return view('criteria_group.index',compact('criteria_group', 'i'));
            }

            if ($data == null) {
                return redirect()->route('questionnaire.create')
                                ->with('failed','Maaf, silahkan isi kuesioner kriteria dahulu.');
            } else {
                $i = 0;
                $criteria_group = DB::table('criterias AS cr')
                                    ->select(DB::raw('cr.id, cr.name, cr.description, (select name from criterias where id = (select group_criteria from criterias as cri where cri.id = cr.id)) AS group_name'))
                                    ->where('cr.status','=','1')
                                    ->orderBy('cr.id','DESC')
                                    ->get();

                return view('criteria_group.index',compact('criteria_group', 'i'));
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
        $role_id = Auth::user()->roleId();
        $user = User::find(Auth::user()->id);
        $data = Choice::where('user_id', '=', $user->id)->first();

        if ($role_id == 3 || $role_id == 4 || $role_id == 5 ||$role_id == 6) {
            if ($user->id == 1) {
                return view('criteria_group.create');
            }
            if ($data == null) {
                return redirect()->route('questionnaire.create')
                                ->with('failed','Maaf, silahkan isi kuesioner kriteria dahulu.');
            } else {
                return view('criteria_group.create');
            }
        } else {
            return redirect()->route('profile_users.show');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['status'] = '1';
        Criteria::create($input);

        return redirect()->route('criteriagroup.index')
                         ->with('success','Kelompok kriteria berhasil dibuat');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role_id = Auth::user()->roleId();
        $user = User::find(Auth::user()->id);
        $data = Choice::where('user_id', '=', $user->id)->first();

        if ($role_id == 3 || $role_id == 4 || $role_id == 5 ||$role_id == 6) {
            if ($user->id == 1) {
                $criteria = Criteria::find($id);
                $criteria_group = Criteria::where('group_criteria','=',null)
                                            ->where('description','=',null)
                                            ->lists('name','id')
                                            ->all();

                return view('criteria_group.edit',compact('criteria', 'criteria_group'));
            }

            if ($data == null) {
                return redirect()->route('questionnaire.create')
                                ->with('failed','Maaf, silahkan isi kuesioner kriteria dahulu.');
            } else {
                $criteria = Criteria::find($id);
                $criteria_group = Criteria::where('group_criteria','=',null)
                                            ->where('description','=',null)
                                            ->lists('name','id')
                                            ->all();

                return view('criteria_group.edit',compact('criteria', 'criteria_group'));
            }
        } else {
            return redirect()->route('profile_users.show');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_group($id)
    {
        $role_id = Auth::user()->roleId();
        $user = User::find(Auth::user()->id);
        $data = Choice::where('user_id', '=', $user->id)->first();

        if ($role_id == 3 || $role_id == 4 || $role_id == 5 ||$role_id == 6) {
            if ($user->id == 1) {
                $criteria_group = Criteria::find($id);

                return view('criteria_group.edit_group',compact('criteria_group'));
            }

            if ($data == null) {
                return redirect()->route('questionnaire.create')
                                ->with('failed','Maaf, silahkan isi kuesioner kriteria dahulu.');
            } else {
                $criteria_group = Criteria::find($id);

                return view('criteria_group.edit_group',compact('criteria_group'));
            }
        } else {
            return redirect()->route('profile_users.show');
        }
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
        Criteria::find($id)->update($request->all());
 
        return redirect()->route('criteriagroup.index')
                         ->with('success','Kriteria berhasil diedit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_group(Request $request, $id)
    {
        Criteria::find($id)->update(array_filter($request->all()));
 
        return redirect()->route('criteriagroup.index')
                         ->with('success','Kelompok kriteria berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Criteria::find($id)->delete();

        return redirect()->route('criteriagroup.index')
                        ->with('success','Kelompok kriteria berhasil dihapus');
    }

    /**
     * Clear the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clear($id)
    {
        Criteria::where('id', $id)->update(['group_criteria' => null]);

        return redirect()->route('criteriagroup.index')
                        ->with('success','Kelompok kriteria berhasil dikosongkan');
    }
}
