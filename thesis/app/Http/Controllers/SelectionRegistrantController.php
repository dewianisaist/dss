<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Selection;
use App\Http\Models\User;
use App\Http\Models\Registrant;
use App\Http\Models\SelectionSchedule;
use DB;

class SelectionRegistrantController extends Controller
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
                            ->select('selections.id', 'users.name AS name_registrant', 'selection_schedules.date', 'selection_schedules.time', 'sub_vocationals.name AS name_sub_vocational')
                            ->orderBy('selections.id','DESC')
                            ->paginate(10);
        // return $data;
        return view('selection_registrants.index',compact('data'))
                    ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    //create dan edit belum
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        // SELECT users.name, sv.name, concat(ss.date," ", ss.time) as jadwal 
        // FROM users, registrants rs, registration rn, sub_vocationals sv, selection_schedules ss 
        // WHERE users.id = rs.user_id AND
        // rs.id = rn.registrant_id AND
        // rn.sub_vocational_id = sv.id AND
        // sv.id = ss.sub_vocational_id

        $registrant = User::join('registrants', 'registrants.user_id', '=', 'users.id')
                          ->join('registration', 'registration.registrant_id', '=', 'registrants.id')
                          ->join('sub_vocationals', 'sub_vocationals.id', '=', 'registration.sub_vocational_id')
                          ->join('selection_schedules', 'selection_schedules.sub_vocational_id', '=', 'sub_vocationals.id')
                          ->select('users.name', 'registration.registrant_id')
                          ->lists('users.name','registration.registrant_id');
        // return $registrant;

        // SELECT users.name, sv.name, concat(ss.date," ", ss.time) as jadwal 
        // FROM users, registrants rs, registration rn, sub_vocationals sv, selection_schedules ss 
        // WHERE users.id = rs.user_id AND
        // rs.id = rn.registrant_id AND
        // rn.sub_vocational_id = sv.id AND
        // sv.id = ss.sub_vocational_id AND
        // users.name = "Pendaftar 1"

        $subvocational = User::join('registrants', 'registrants.user_id', '=', 'users.id')
                             ->join('registration', 'registration.registrant_id', '=', 'registrants.id')
                             ->join('sub_vocationals', 'sub_vocationals.id', '=', 'registration.sub_vocational_id')
                             ->join('selection_schedules', 'selection_schedules.sub_vocational_id', '=', 'sub_vocationals.id')
                             ->select('registration.sub_vocational_id', 'sub_vocationals.name AS subkejuruan')
                            //  ->whereIn('registration.registrant_id', $registrant)->value('users.name')
                             ->lists('subkejuruan','registration.sub_vocational_id');
        // return $subvocational;

        // SELECT users.name, sv.name, concat(ss.date," ", ss.time) as jadwal 
        // FROM users, registrants rs, registration rn, sub_vocationals sv, selection_schedules ss 
        // WHERE users.id = rs.user_id AND
        // rs.id = rn.registrant_id AND
        // rn.sub_vocational_id = sv.id AND
        // sv.id = ss.sub_vocational_id AND
        // users.name = "Pendaftar 1" AND
        // sv.name = "Menjahit sub 1"

        $schedule = User::join('registrants', 'registrants.user_id', '=', 'users.id')
                        ->join('registration', 'registration.registrant_id', '=', 'registrants.id')
                        ->join('sub_vocationals', 'sub_vocationals.id', '=', 'registration.sub_vocational_id')
                        ->join('selection_schedules', 'selection_schedules.sub_vocational_id', '=', 'sub_vocationals.id')
                        ->select('selection_schedules.id', DB::raw('CONCAT(selection_schedules.date," - ",selection_schedules.time) as jadwal'))
                        // ->whereIn('registration.sub_vocational_id', $subvocational)->value('sub_vocationals.name AS subkejuruan')
                        ->lists('jadwal','selection_schedules.id');
        // return $schedule;

        // return compact('registrant', 'subvocational', 'schedule');
        return view('selection_registrants.create',compact('registrant', 'subvocational', 'schedule'));
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
         'registrant_id' => 'required',
         'selection_schedule_id' => 'required',
        ]);
 
        $input = $request->all();
        $selection = Selection::create($input);
 
        return redirect()->route('selections.index')
                        ->with('success','Jadwal seleksi peserta berhasil dibuat');
    }
 
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $selection_registrant = Selection::join('registrants', 'registrants.id', '=', 'selections.registrant_id')
                                        ->join('users', 'users.id', '=', 'registrants.user_id')
                                        ->join('selection_schedules', 'selection_schedules.id', '=', 'selections.selection_schedule_id')
                                        ->join('sub_vocationals', 'sub_vocationals.id', '=', 'selection_schedules.sub_vocational_id')
                                        ->select('selections.id', 'users.name AS name_registrant', 'selection_schedules.date', 'selection_schedules.time', 'sub_vocationals.name AS name_sub_vocational')
                                        ->first();
       return view('selection_registrants.show',compact('selection_registrant'));
    // return compact('selection_registrant');
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
        $registrant = Registrant::lists('name','id');
        $selectionschedule = SelectionSchedule::select(DB::raw('CONCAT(date, " - ", time) AS waktu_seleksi'), 'id')
                                                            ->lists('waktu_seleksi', 'id');

        return view('selectionschedules.edit',compact('selectionschedule','subvocational','subvocationalchoosen'));
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
        'sub_vocational_id' => 'required',
        'date' => 'required',
        'time' => 'required',
        'place' => 'required',
       ]);

       $input = $request->all();
       $selectionschedule = SelectionSchedule::find($id);
       $selectionschedule->update($input);

       return redirect()->route('selectionschedules.index')
                       ->with('success','Jadwal seleksi berhasil diedit');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       Selection::find($id)->delete();
       return redirect()->route('selectionregistrants.index')
                       ->with('success','Jadwal seleksi peserta berhasil dihapus');
   }
}
