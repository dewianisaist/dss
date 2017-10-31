<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Education;

class EducationController extends Controller
{
     /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
       $educations = Education::orderBy('id','DESC')->paginate(10);
       return view('educations.index',compact('educations'))
           ->with('i', ($request->input('page', 1) - 1) * 10);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('educations.create');
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
        'stage' => 'required',
       ]);

       Education::create($request->all());

       return redirect()->route('educations.index')
                       ->with('success','Pendidikan berhasil dibuat');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $education = Education::find($id);
       return view('educations.show',compact('education'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $education = Education::find($id);
       return view('educations.edit',compact('education'));
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
           'stage' => 'required',
       ]);

       Education::find($id)->update($request->all());

       return redirect()->route('educations.index')
                       ->with('success','Pendidikan berhasil diedit');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
        Education::find($id)->delete();
       return redirect()->route('educations.index')
                       ->with('success','Pendidikan berhasil dihapus');
   }
}
