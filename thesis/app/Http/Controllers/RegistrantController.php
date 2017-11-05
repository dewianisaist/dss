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
   public function edit()
   {
       $user = User::with('registrant', 'registrant.upload')->find(Auth::user()->id);
    //    return $user;
       return view('registrants.edit',compact('user'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request)
    {
        $this->validate($request, [
             'name' => 'required',
             'email' => 'required|email|unique:users,email,'.Auth::user()->id,
             'password' => 'same:confirm-password',
             'address' => 'required',
             'phone_number' => 'required',
             'gender' => 'required',
             'place_birth' => 'required',
             'date_birth' => 'required',
             'order_child' => 'required',
             'amount_sibling' => 'required',
             'religion' => 'required',
             'biological_mother_name' => 'required',
             'father_name' => 'required',
             'parent_address' => 'required',
            //  'photo' => 'required',
            //  'ktp' => 'required',
            //  'last_cetificate' => 'required',
        ]);
 
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }
 
        $user = User::find(Auth::user()->id);
        $user->update($input);
        $registrant = Registrant::find(Auth::user()->id);
        $registrant->update($input);
        $upload = Upload::find(Auth::user()->id);
        $upload->update($input);
 
        return redirect()->route('registrants.index')
                        ->with('success','Data diri berhasil disimpan');
    }
}
