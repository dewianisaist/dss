<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Course;

class CourseController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
       $courses = Course::orderBy('id','DESC')->paginate(10);
       return view('courses.index',compact('courses'))
           ->with('i', ($request->input('page', 1) - 1) * 10);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('courses.create');
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
        'major' => 'required',
       ]);

       Course::create($request->all());

       return redirect()->route('courses.index')
                       ->with('success','Kursus berhasil dibuat');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $course = Course::find($id);
       return view('courses.show',compact('course'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $course = Course::find($id);
       return view('courses.edit',compact('course'));
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
           'major' => 'required',
       ]);

       Course::find($id)->update($request->all());

       return redirect()->route('courses.index')
                       ->with('success','Kursus berhasil diedit');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       Course::find($id)->delete();
       return redirect()->route('courses.index')
                       ->with('success','Kursus berhasil dihapus');
   }
}
