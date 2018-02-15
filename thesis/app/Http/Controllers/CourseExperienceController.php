<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\CourseExperience;
use App\Http\Models\Course;
use App\Http\Models\User;
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
        $role_id = Auth::user()->roleId();
        $user = User::with('registrant')->find(Auth::user()->id);

        if ($role_id == 2) {
            if ($user->registrant == null) {
                return redirect()->route('registrants.edit')
                                ->with('failed','Maaf, silahkan lengkapi data diri Anda dahulu.');
            } else {
                $course_experiences = CourseExperience::with('course')->whereRegistrantId($user->registrant->id)
                                                                    ->orderBy('course_id','DESC')->paginate(10);
                
                return view('course_experience.index',compact('user', 'course_experiences'))
                            ->with('i', ($request->input('page', 1) - 1) * 10);
            }
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
        $user = User::with('registrant')->find(Auth::user()->id);

        if ($role_id == 2) {
            if ($user->registrant == null) {
                return redirect()->route('registrants.edit')
                                ->with('failed','Maaf, silahkan lengkapi data diri Anda dahulu.');
            } else {
                $course = Course::lists('major','id');

                return view('course_experience.create',compact('course'));
            }
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
            'course_id' => 'required',
            'organizer' => 'required',        
            'graduation_year' => 'required',
        ]);

        $input = $request->all();
        $user = User::with('registrant')->find(Auth::user()->id);
        $input['registrant_id'] = $user->registrant->id;
        $course_experience = CourseExperience::create($input);

        return redirect()->route('course_experience.index')
                        ->with('success','Pengalaman kursus/pelatihan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     * 
     * @param  int  $course_id, $organizer, $graduation_year
     * @return \Illuminate\Http\Response
     */
    public function show($course_id, $organizer, $graduation_year)
    {
        $role_id = Auth::user()->roleId();

        if ($role_id == 2) {
            $course_experience = CourseExperience::with('course')
                                                    ->where('course_id', $course_id)
                                                    ->where('organizer', $organizer)
                                                    ->where('graduation_year', $graduation_year)
                                                    ->first();
            
            return view('course_experience.show',compact('course_experience'));
        } else {
            return redirect()->route('profile_users.show');
        }
    }
 
    /**
     * Show the form for editing the specified resource.
     * 
     * @param  int  $course_id, $organizer, $graduation_year
     * @return \Illuminate\Http\Response
     */
    public function edit($course_id, $organizer, $graduation_year)
    {
        $role_id = Auth::user()->roleId();

        if ($role_id == 2) {
            $course_experience = CourseExperience::where('course_id', $course_id)
                                                ->where('organizer', $organizer)
                                                ->where('graduation_year', $graduation_year)
                                                ->first();
            $course = Course::lists('major','id');
            $coursechoosen = CourseExperience::where('course_id', $course_experience)->value('course_id');

            return view('course_experience.edit',compact('course_experience','course', 'coursechoosen'));
        } else {
            return redirect()->route('profile_users.show');
        }
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $course_id, $organizer, $graduation_year
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $course_id, $organizer, $graduation_year)
    {
        $this->validate($request, [
            'course_id' => 'required',
            'organizer' => 'required',        
            'graduation_year' => 'required',
        ]);   

        $input = $request->except('_method', '_token');
        $user = User::with('registrant')->find(Auth::user()->id);
        $input['registrant_id'] = $user->registrant->id;
        CourseExperience::where('course_id', $course_id)
                        ->where('organizer', $organizer)
                        ->where('graduation_year', $graduation_year)
                        ->update($input);

        return redirect()->route('course_experience.index')
                         ->with('success','Pengalaman kursus/pelatihan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $course_id, $organizer, $graduation_year
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_id, $organizer, $graduation_year)
    {
        CourseExperience::where('course_id', $course_id)
                            ->where('organizer', $organizer)
                            ->where('graduation_year', $graduation_year)
                            ->delete();

        return redirect()->route('course_experience.index')
                         ->with('success','Pengalaman kursus/pelatihan berhasil dihapus');
    }
}
