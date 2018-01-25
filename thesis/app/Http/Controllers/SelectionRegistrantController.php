<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Selection;
use App\Http\Models\User;
use App\Http\Models\Registrant;
use App\Http\Models\SelectionSchedule;
use App\Http\Models\Registration;
use DB;
use Auth;

class SelectionRegistrantController extends Controller
{
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $role_id = Auth::user()->roleId();
        $data = Selection::join('registrants', 'registrants.id', '=', 'selections.registrant_id')
                            ->join('users', 'users.id', '=', 'registrants.user_id')
                            ->join('selection_schedules', 'selection_schedules.id', '=', 'selections.selection_schedule_id')
                            ->join('sub_vocationals', 'sub_vocationals.id', '=', 'selection_schedules.sub_vocational_id')
                            ->select('selections.id', 'users.name AS name_registrant', 'selection_schedules.date', 'selection_schedules.time', 'selection_schedules.place', 'sub_vocationals.name AS name_sub_vocational')
                            ->orderBy('selections.id','DESC')
                            ->paginate(10);
        if ($role_id != 2) {
            return view('selection_registrants.index',compact('data'))
                    ->with('i', ($request->input('page', 1) - 1) * 10);
        } else {
            return redirect()->route('registrants.index');
        }
    }

    //create dan edit belum
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $new = array();

        $registrants = Registrant::select('users.name', 'registrants.id as registrant_id')
                                    ->join('users','registrants.user_id', '=', 'users.id')
                                    ->get();

        foreach ($registrants as $registrant) {
            $new[$registrant->name] = new \stdClass();
            $new[$registrant->name]->registrant = (Object)$registrant;
            $schedule = Registration::select('selection_schedules.id','sub_vocationals.name','selection_schedules.date','selection_schedules.time', 'selection_schedules.place')
                                    ->join('selection_schedules','selection_schedules.sub_vocational_id','=','registration.sub_vocational_id')
                                    ->join('sub_vocationals','sub_vocationals.id','=','selection_schedules.sub_vocational_id')
                                    ->where('registration.registrant_id','=',$registrant->registrant_id)
                                    ->get();
            $new[$registrant->name]->schedule = (object)$schedule;
        }

        return $new;

        // SELECT users.name, sv.name, concat(ss.date," ", ss.time) as jadwal 
        // FROM users, registrants rs, registration rn, sub_vocationals sv, selection_schedules ss 
        // WHERE users.id = rs.user_id AND
        // rs.id = rn.registrant_id AND
        // rn.sub_vocational_id = sv.id AND
        // sv.id = ss.sub_vocational_id

        // $registrants = User::join('registrants', 'registrants.user_id', '=', 'users.id')
        //                   ->join('registration', 'registration.registrant_id', '=', 'registrants.id')
        //                   ->join('sub_vocationals', 'sub_vocationals.id', '=', 'registration.sub_vocational_id')
        //                   ->join('selection_schedules', 'selection_schedules.sub_vocational_id', '=', 'sub_vocationals.id')
        //                   ->pluck('users.name','registration.registrant_id')
        //                   ->all();

        // $schedules = User::join('registrants', 'registrants.user_id', '=', 'users.id')
        //                 ->join('registration', 'registration.registrant_id', '=', 'registrants.id')
        //                 ->join('sub_vocationals', 'sub_vocationals.id', '=', 'registration.sub_vocational_id')
        //                 ->join('selection_schedules', 'selection_schedules.sub_vocational_id', '=', 'sub_vocationals.id')
        //                 ->select('selection_schedules.id', DB::raw('CONCAT(sub_vocationals.name," - ", selection_schedules.date," & ",selection_schedules.time) as jadwal'))
        //                 ->where('registrants.user_id', $registrant)->value('users.name')
        //                 ->lists('jadwal','selection_schedules.id');
        // return view('selection_registrants.create',compact('registrants'));
    }

    /**
     * Show the application selectAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectAjax(Request $request)
    {
    	if($request->ajax()){
    		$schedules = User::join('registrants', 'registrants.user_id', '=', 'users.id')
                            ->join('registration', 'registration.registrant_id', '=', 'registrants.id')
                            ->join('sub_vocationals', 'sub_vocationals.id', '=', 'registration.sub_vocational_id')
                            ->join('selection_schedules', 'selection_schedules.sub_vocational_id', '=', 'sub_vocationals.id')
                            ->select('selection_schedules.id', DB::raw('CONCAT(sub_vocationals.name," - ", selection_schedules.date," & ",selection_schedules.time) as jadwal'))
                            ->where('registrants.id', $request->registrants.id)
                            ->pluck('jadwal','selection_schedules.id')
                            ->all();

    		$data = view('selections_registrants.ajax-select',compact('schedules'))->render();
            return response()->json(['options'=>$data]);
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
        $this->validate($request, [
         'registrant_id' => 'required',
         'selection_schedule_id' => 'required',
        ]);
 
        $input = $request->all();
        $selection = Selection::create($input);
 
        return redirect()->route('selectionregistrants.index')
                        ->with('success','Jadwal seleksi pendaftar berhasil dibuat');
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
        $selection = Selection::find($id);
        $registrant = User::join('registrants', 'registrants.user_id', '=', 'users.id')
                          ->join('registration', 'registration.registrant_id', '=', 'registrants.id')
                          ->join('sub_vocationals', 'sub_vocationals.id', '=', 'registration.sub_vocational_id')
                          ->join('selection_schedules', 'selection_schedules.sub_vocational_id', '=', 'sub_vocationals.id')
                          ->select('users.name', 'registration.registrant_id')
                          ->lists('users.name','registration.registrant_id');

        $registrantchoosen = User::join('registrants', 'registrants.user_id', '=', 'users.id')
                                 ->join('registration', 'registration.registrant_id', '=', 'registrants.id')
                                 ->join('sub_vocationals', 'sub_vocationals.id', '=', 'registration.sub_vocational_id')
                                 ->join('selection_schedules', 'selection_schedules.sub_vocational_id', '=', 'sub_vocationals.id')
                                 ->select('users.name', 'registration.registrant_id')
                                 ->where('registration.registrant_id', $selection)->value('users.name');

        $schedule = User::join('registrants', 'registrants.user_id', '=', 'users.id')
                        ->join('registration', 'registration.registrant_id', '=', 'registrants.id')
                        ->join('sub_vocationals', 'sub_vocationals.id', '=', 'registration.sub_vocational_id')
                        ->join('selection_schedules', 'selection_schedules.sub_vocational_id', '=', 'sub_vocationals.id')
                        ->select('selection_schedules.id', DB::raw('CONCAT(sub_vocationals.name," - ", selection_schedules.date," & ",selection_schedules.time) as jadwal'))
                        ->lists('jadwal','selection_schedules.id');
        
        $schedulechoosen = User::join('registrants', 'registrants.user_id', '=', 'users.id')
                                ->join('registration', 'registration.registrant_id', '=', 'registrants.id')
                                ->join('sub_vocationals', 'sub_vocationals.id', '=', 'registration.sub_vocational_id')
                                ->join('selection_schedules', 'selection_schedules.sub_vocational_id', '=', 'sub_vocationals.id')
                                ->select('selection_schedules.id', DB::raw('CONCAT(sub_vocationals.name," - ", selection_schedules.date," & ",selection_schedules.time) as jadwal'))
                                ->where('selection_schedules.id', $selection)->value(DB::raw('CONCAT(sub_vocationals.name," - ", selection_schedules.date," & ",selection_schedules.time) as jadwal'));

        return view('selection_registrants.edit',compact('selection', 'registrant', 'registrantchoosen', 'schedule', 'schedulechoosen'));
        // return $selection;     
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
        'registrant_id' => 'required',
        'selection_schedule_id' => 'required',
       ]);

       $input = $request->all();
       $selection = Selection::find($id);
       $selection->update($input);

       return redirect()->route('selectionregistrants.index')
                       ->with('success','Jadwal seleksi pendaftar berhasil diedit');
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
                       ->with('success','Jadwal seleksi pendaftar berhasil dihapus');
   }
}
