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
       $data = Selection::with('registrant','selectionschedule')->orderBy('id','DESC')->paginate(10);
       return view('selection.index',compact('data'))
           ->with('i', ($request->input('page', 1) - 1) * 10);
    // return $data;
   }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       $subvocational = Subvocational::lists('name','id');
       return view('selection.create',compact('subvocational'));
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
