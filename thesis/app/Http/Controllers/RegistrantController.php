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

class RegistrantController extends Controller
{
    /**
    * Display the specified resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index() {
        $data = Registrant::whereUserId(Auth::user()->id)->first();
        if ($data == null) {
            return view('registrants.edit',compact('data'));
        } else {
            return view('registrants.index',compact('data'));
        }
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
    //    $registrant = Registrant::whereUserId(Auth::user()->id)->first();
       $registrant = Registrant::find($id);
       $user = User::find(Auth::user()->id);
       return view('registrants.edit',compact('registrant','user'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request)
    {
        // $this->validate($request, [
        //      'name' => 'required',
        //      'email' => 'required|email|unique:users,email,'.Auth::user()->id,
        //      'password' => 'same:confirm-password',
        // ]);
 
        // $input = $request->all();
        // if(!empty($input['password'])){ 
        //     $input['password'] = Hash::make($input['password']);
        // }else{
        //     $input = array_except($input,array('password'));    
        // }
 
        // $profile_user = User::find(Auth::user()->id);
        // $profile_user->update($input);
 
        // return redirect()->route('profile_users.show')
        //                 ->with('success','Profil berhasil diedit');
    }
}
