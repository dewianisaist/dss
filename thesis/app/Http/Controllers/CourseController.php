<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Course;
use App\Http\Models\CourseExperience;
use Auth;

class CourseController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
        $role_id = Auth::user()->roleId();

        if ($role_id == 1) {
            $courses = Course::orderBy('id','DESC')->paginate(10);

            return view('courses.index',compact('courses'))
                ->with('i', ($request->input('page', 1) - 1) * 10);
        } else {
            return redirect()->route('profile_users.show');
        }        
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
        $role_id = Auth::user()->roleId();

        if ($role_id == 1) {
            return view('courses.create');
        } else {
            return redirect()->route('profile_users.show');
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
        $role_id = Auth::user()->roleId();

        if ($role_id == 1) {
            $course = Course::find($id);

            return view('courses.show',compact('course'));
        } else {
            return redirect()->route('profile_users.show');
        }
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
        $role_id = Auth::user()->roleId();

        if ($role_id == 1) {
            $course = Course::find($id);

            return view('courses.edit',compact('course'));
        } else {
            return redirect()->route('profile_users.show');
        }
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
        $course_experience = CourseExperience::with('course')
                                                ->where('course_id', '=', $id)
                                                ->first();

        if ($course_experience == null) {
            Course::find($id)->delete();
                                        
            return redirect()->route('courses.index')
                             ->with('success','Kursus berhasil dihapus');
        } else {
            return redirect()->route('courses.index')
                             ->with('failed','Kursus tidak bisa dihapus karena sudah digunakan sebagai pengalaman pelatihan pendaftar');
        }
   }
}
