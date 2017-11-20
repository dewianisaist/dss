<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Selection;
use App\Http\Models\Registrant;
use App\Http\Models\SelectionSchedule;

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
                            ->select('selections.*', 'users.name AS name_registrant', 'selection_schedules.date', 'selection_schedules.time', 'sub_vocationals.name AS name_sub_vocational')
                            ->orderBy('selections.id','DESC')
                            ->paginate(10);
        // return $data;
        return view('selections.index',compact('data'))
                    ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $registrant = Registrant::lists('name','id');
        $selectionschedule = SelectionSchedule::select(DB::raw('CONCAT(date, " - ", time) AS waktu_seleksi'), 'id')
                                                            ->lists('waktu_seleksi', 'id');

        return view('selections.create',compact('registrant', 'selectionschedule'));
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
       $selection = Selection::find($id);
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
       SelectionSchedule::find($id)->delete();
       return redirect()->route('selectionschedules.index')
                       ->with('success','Jadwal seleksi berhasil dihapus');
   }
}
