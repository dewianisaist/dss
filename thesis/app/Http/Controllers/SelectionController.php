<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Selection;
use App\Http\Models\Registration;
use App\Http\Models\Registrant;
use App\Http\Models\SelectionSchedule;
use Auth;

class SelectionController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
        $role_id = Auth::user()->roleId();

        $data = Selection::select('selections.*', 'users.name AS name_registrant', 'selection_schedules.date', 
                                  'selection_schedules.time', 'sub_vocationals.name AS name_sub_vocational')
                            ->join('registrations', 'registrations.id', '=', 'selections.registration_id')
                            ->join('registrants', 'registrants.id', '=', 'registrations.registrant_id')
                            ->join('users', 'users.id', '=', 'registrants.user_id')
                            ->join('selection_schedules', 'selection_schedules.id', '=', 'selections.selection_schedule_id')
                            ->join('sub_vocationals', 'sub_vocationals.id', '=', 'selection_schedules.sub_vocational_id')
                            ->orderBy('selections.id','DESC')->paginate(10);
        // return $data;

        if ($role_id == 3 || $role_id == 5 || $role_id == 6) {
            return view('selections.index',compact('data'))
                        ->with('i', ($request->input('page', 1) - 1) * 10);
        } else {
            return redirect()->route('profile_users.show');
        }
   }
 
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
        $selection = Selection::select('selections.*', 'users.name AS name_registrant', 'selection_schedules.date', 
                                        'selection_schedules.time', 'sub_vocationals.name AS name_sub_vocational')
                                ->join('registrations', 'registrations.id', '=', 'selections.registration_id')
                                ->join('registrants', 'registrants.id', '=', 'registrations.registrant_id')
                                ->join('users', 'users.id', '=', 'registrants.user_id')
                                ->join('selection_schedules', 'selection_schedules.id', '=', 'selections.selection_schedule_id')
                                ->join('sub_vocationals', 'sub_vocationals.id', '=', 'selection_schedules.sub_vocational_id')
                                ->where('selections.id', '=', $id)
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
        $selection = Selection::select('selections.*', 'users.name AS name_registrant', 'selection_schedules.date', 
                                        'selection_schedules.time', 'sub_vocationals.name AS name_sub_vocational')
                                ->join('registrations', 'registrations.id', '=', 'selections.registration_id')
                                ->join('registrants', 'registrants.id', '=', 'registrations.registrant_id')
                                ->join('users', 'users.id', '=', 'registrants.user_id')
                                ->join('selection_schedules', 'selection_schedules.id', '=', 'selections.selection_schedule_id')
                                ->join('sub_vocationals', 'sub_vocationals.id', '=', 'selection_schedules.sub_vocational_id')
                                ->where('selections.id', '=', $id)
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
       $selection = Selection::select('selections.*', 'users.name AS name_registrant', 'selection_schedules.date', 
                                        'selection_schedules.time', 'sub_vocationals.name AS name_sub_vocational')
                                ->join('registrations', 'registrations.id', '=', 'selections.registration_id')
                                ->join('registrants', 'registrants.id', '=', 'registrations.registrant_id')
                                ->join('users', 'users.id', '=', 'registrants.user_id')
                                ->join('selection_schedules', 'selection_schedules.id', '=', 'selections.selection_schedule_id')
                                ->join('sub_vocationals', 'sub_vocationals.id', '=', 'selection_schedules.sub_vocational_id')
                                ->where('selections.id', '=', $id)
                                ->first();
       $selection->update($input);

       return redirect()->route('selections.index')
                        ->with('success','Nilai seleksi berhasil disimpan');
   }
}
