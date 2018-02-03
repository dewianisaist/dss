<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Criteria;
use Auth;

class CriteriaGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $criteria_group = Criteria::where('status', '=', '1')->orderBy('id','DESC')->paginate(5);
        // return $criteria_group;
        return view('criteria_group.index',compact('criteria_group'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
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
}
