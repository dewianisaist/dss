<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Selection;
use App\Http\Models\Registrant;
use App\Http\Models\SelectionSchedule;

class SelectionController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
        $data = Selection::join('registrants', 'registrants.id', '=', 'selections.registrant_id')
                            ->join('users', 'users.id', '=', 'registrants.user_id')
                            ->join('selection_schedules', 'selection_schedules.id', '=', 'selections.selection_schedule_id')
                            ->join('sub_vocationals', 'sub_vocationals.id', '=', 'selection_schedules.sub_vocational_id')
                            ->select('selections.*', 'users.name AS name_registrant', 'selection_schedules.date', 'selection_schedules.time', 'sub_vocationals.name AS name_sub_vocational')
                            ->orderBy('selections.id','DESC')
                            ->paginate(10);

        return view('selections.index',compact('data'))
                    ->with('i', ($request->input('page', 1) - 1) * 10);
   }
 
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
        $selection = Selection::join('registrants', 'registrants.id', '=', 'selections.registrant_id')
                                ->join('users', 'users.id', '=', 'registrants.user_id')
                                ->join('selection_schedules', 'selection_schedules.id', '=', 'selections.selection_schedule_id')
                                ->join('sub_vocationals', 'sub_vocationals.id', '=', 'selection_schedules.sub_vocational_id')
                                ->where('selections.id', '=', $id)
                                ->select('selections.*', 'users.name AS name_registrant', 'selection_schedules.date', 'selection_schedules.time', 'sub_vocationals.name AS name_sub_vocational')
                                ->first();

        return view('selections.show',compact('selection'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
        $selection = Selection::join('registrants', 'registrants.id', '=', 'selections.registrant_id')
                                ->join('users', 'users.id', '=', 'registrants.user_id')
                                ->join('selection_schedules', 'selection_schedules.id', '=', 'selections.selection_schedule_id')
                                ->join('sub_vocationals', 'sub_vocationals.id', '=', 'selection_schedules.sub_vocational_id')
                                ->where('selections.id', '=', $id)
                                ->select('selections.*', 'users.name AS name_registrant', 'selection_schedules.date', 'selection_schedules.time', 'sub_vocationals.name AS name_sub_vocational')
                                ->first();

        return view('selections.edit',compact('selection'));
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
        'written_value' => 'required',
        'interview_value' => 'required',
       ]);

       $input = $request->all();
       $selection = Selection::join('registrants', 'registrants.id', '=', 'selections.registrant_id')
                                ->join('users', 'users.id', '=', 'registrants.user_id')
                                ->join('selection_schedules', 'selection_schedules.id', '=', 'selections.selection_schedule_id')
                                ->join('sub_vocationals', 'sub_vocationals.id', '=', 'selection_schedules.sub_vocational_id')
                                ->where('selections.id', '=', $id)
                                ->select('selections.*', 'users.name AS name_registrant', 'selection_schedules.date', 'selection_schedules.time', 'sub_vocationals.name AS name_sub_vocational')
                                ->first();
       $selection->update($input);

       return redirect()->route('selections.index')
                        ->with('success','Nilai seleksi berhasil disimpan');
   }
}
