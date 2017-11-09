<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\CourseExperience;
use App\Http\Models\Course;
use App\Http\Models\Registrant;
use App\Http\Models\User;
use DB;
use Auth;

class CourseExperienceController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
        $user = User::with('registrant', 'registrant.courses')->find(Auth::user()->id);
        $course_experiences = CourseExperience::orderBy('course_id','DESC')->paginate(10);
        
        if ($user->registrant == null) {
           return view('registrants.edit',compact('user'));
        } else {
            return view('course_experience.index',compact('user', 'course_experiences'))
                        ->with('i', ($request->input('page', 1) - 1) * 10);
        }
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       $course = Course::lists('major','id');

       return view('course_experience.create',compact('course'));
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
        'course_id' => 'required',
        'organizer' => 'required',        
        'graduation_year' => 'required',
       ]);

       $input = $request->all();
       $users = User::with('registrant', 'registrant.educations')->find(Auth::user()->id);
       $input['registrant_id'] = $users->registrant->id;
       $course_experience = CourseExperience::create($input);

       return redirect()->route('course_experience.index')
                        ->with('success','Pengalaman kursus/pelatihan berhasil ditambahkan.');
   }

    /**
    * Display the specified resource.
    *
    * @param  int  $course_id
    * @return \Illuminate\Http\Response
    */
    public function show($course_id)
    {
        $course = Course::where('id', $course_id)->first();
        $course_experience = CourseExperience::where('course_id', $course_id)->first();

        return view('course_experience.show',compact('course','course_experience'));
    }
 
   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $course_id
    * @return \Illuminate\Http\Response
    */
   public function edit($course_id)
   {
        $course_experience = CourseExperience::where('course_id', $course_id)->first();
        $course = Course::lists('major','id');
        $coursechoosen = CourseExperience::where('course_id', $course_experience)->value('course_id');

        return view('course_experience.edit',compact('course_experience','course', 'coursechoosen'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $course_id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $course_id)
   {
        $this->validate($request, [
            'course_id' => 'required',
            'organizer' => 'required',        
            'graduation_year' => 'required',
        ]);   

        $input = $request->except('_method', '_token');
        $users = User::with('registrant', 'registrant.educations')->find(Auth::user()->id);
        $input['registrant_id'] = $users->registrant->id;
        CourseExperience::where('course_id', $course_id)->update($input);

       return redirect()->route('course_experience.index')
                        ->with('success','Pengalaman kursus/pelatihan berhasil diedit');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $course_id
    * @return \Illuminate\Http\Response
    */
   public function destroy($course_id)
   {
       CourseExperience::where('course_id', $course_id)->delete();

       return redirect()->route('course_experience.index')
                        ->with('success','Pengalaman kursus/pelatihan berhasil dihapus');
   }
}
