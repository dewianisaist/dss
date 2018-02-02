<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Subvocational;
use App\Http\Models\SelectionSchedule;
use Auth;

class SelectionScheduleController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
        $role_id = Auth::user()->roleId();
        $data = SelectionSchedule::with('subvocational')->orderBy('id','DESC')->paginate(10);
        if ($role_id == 1 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6) {
            return view('selectionschedules.index',compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * 10);
        } else {
            return redirect()->route('registrants.index');
        }
   }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       $subvocational = Subvocational::lists('name','id');
       return view('selectionschedules.create',compact('subvocational'));
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
         'sub_vocational_id' => 'required',
         'date' => 'required',
         'time' => 'required',
         'place' => 'required',
        ]);
 
        $input = $request->all();
        $selectionschedule = SelectionSchedule::create($input);
 
        return redirect()->route('selectionschedules.index')
                        ->with('success','Jadwal seleksi berhasil dibuat');
    }
 
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $selectionschedule = SelectionSchedule::find($id);
       return view('selectionschedules.show',compact('selectionschedule'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
        $selectionschedule = SelectionSchedule::find($id);
        $subvocational = Subvocational::lists('name','id');
        $subvocationalchoosen = Subvocational::where('id', $selectionschedule)->value('name');

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
