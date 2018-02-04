<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $i = 0;
        $criteria_group = DB::table('criterias AS cr')
                            ->select(DB::raw('cr.id, cr.name, cr.description, (select name from criterias where id = (select group_criteria from criterias as cri where cri.id = cr.id)) AS group_name'))
                            ->where('cr.status','=','1')
                            ->orderBy('cr.id','DESC')
                            ->get();

        // SELECT name, description, (select name from criterias where id = (select group_criteria from criterias as cri where cri.id = cr.id)) FROM `criterias` as cr where status = 1

        return view('criteria_group.index',compact('criteria_group', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('criteria_group.create');
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
        $criteria = Criteria::find($id);
        $criteria_group = Criteria::where('group_criteria','=',null)
                                    ->where('description','=',null)
                                    ->lists('name','id')
                                    ->all();

        return view('criteria_group.edit',compact('criteria', 'criteria_group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_group($id)
    {
        $criteria_group = Criteria::find($id);

        return view('criteria_group.edit_group',compact('criteria_group'));
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
        // update criterias set criterias.group_criteria = null where id = 25

        return redirect()->route('criteriagroup.index')
                        ->with('success','Kelompok kriteria berhasil dikosongkan');
    }
}
