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
                    ->select('users.identity_number', 'users.name AS name_registrant', 'sub_vocationals.name AS name_sub_vocational', 'registration.register_date')
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
    public function show($id)
    {
        //
    }
}