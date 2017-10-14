<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kejuruan;

class KejuruanController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
       $kejuruans = Kejuruan::orderBy('id','DESC')->paginate(5);
       return view('kejuruan.index',compact('kejuruans'))
           ->with('i', ($request->input('page', 1) - 1) * 5);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('kejuruan.create');
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
           'nama' => 'required',
       ]);

       Kejuruan::create($request->all());

       return redirect()->route('kejuruan.index')
                       ->with('success','Kejuruan berhasil dibuat');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $kejuruan = Kejuruan::find($id);
       return view('kejuruan.show',compact('kejuruan'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $kejuruan = Kejuruan::find($id);
       return view('kejuruan.edit',compact('kejuruan'));
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
           'nama' => 'required',
       ]);

       Kejuruan::find($id)->update($request->all());

       return redirect()->route('kejuruan.index')
                       ->with('success','Kejuruan berhasil diedit');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       Kejuruan::find($id)->delete();
       return redirect()->route('kejuruan.index')
                       ->with('success','Kejuruan berhasil dihapus');
   }
}
