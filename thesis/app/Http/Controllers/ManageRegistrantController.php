<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Registrant;
use App\Http\Models\User;
use App\Http\Models\Upload;
use App\Http\Models\Education;
use App\Http\Models\EducationalBackground;
use App\Http\Models\Course;
use App\Http\Models\CourseExperience;
use Auth;

class ManageRegistrantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $role_id = Auth::user()->roleId();
        $data = User::join('registrants', 'registrants.user_id', '=', 'users.id')
                    ->join('registration', 'registration.registrant_id', '=', 'registrants.id')
                    ->join('sub_vocationals', 'sub_vocationals.id', '=', 'registration.sub_vocational_id')
                    ->select('users.identity_number', 'users.name AS name_registrant', 'registrants.id AS id_registrant', 'sub_vocationals.name AS name_sub_vocational', 'registration.register_date')
                    ->orderBy('name_registrant','ASC')
                    ->paginate(10);
        if ($role_id != 2) {
            return view('manage_registrants.index',compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * 10);
        } else {
            return redirect()->route('registrants.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        $user = Registrant::select('users.*', 'registrants.*', 'uploads.*')
                            ->join('users','registrants.user_id', '=', 'users.id')
                            ->join('uploads','uploads.registrant_id', '=', 'registrants.id')
                            ->find($id);
        return view('manage_registrants.profile',compact('user'));
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $education_id, $name_institution, $graduation_year
    * @return \Illuminate\Http\Response
    */
    public function education($education_id, $name_institution, $graduation_year)
    {
        $educational_background = EducationalBackground::with('education')
                                                        ->where('education_id', $education_id)
                                                        ->where('name_institution', $name_institution)
                                                        ->where('graduation_year', $graduation_year)
                                                        ->first();

        return view('educational_background.show',compact('educational_background'));
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $course_id, $organizer, $graduation_year
    * @return \Illuminate\Http\Response
    */
    public function course($course_id, $organizer, $graduation_year)
    {
        $course_experience = CourseExperience::with('course')->where('course_id', $course_id)
                                                             ->where('organizer', $organizer)
                                                             ->where('graduation_year', $graduation_year)
                                                             ->first();
        
        return view('course_experience.show',compact('course_experience'));
    }
}