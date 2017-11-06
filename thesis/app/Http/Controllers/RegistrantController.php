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
use Hash;

class RegistrantController extends Controller
{
    /**
    * Display the specified resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index() {
        // $data = Registrant::whereUserId(Auth::user()->id)->first();
        $user = User::with('registrant', 'registrant.upload')->find(Auth::user()->id);
        return $user;
        if ($user->registrant == null) {
            return view('registrants.edit',compact('user'));
        } else {
            return view('registrants.index',compact('user'));
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
            //  'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'photo' => 'required',
             'ktp' => 'required',
             'last_certificate' => 'required',
        ]);
        
        $input = $request->all();
        $user = User::find(Auth::user()->id);
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input['password'] = $user->password;    
        }
 
        $user->update(['name' => $input['name'], 
                        'email' => $input['email'], 
                        'password' => $input['password']]);

        $registrant = Registrant::find(Auth::user()->registrant->id)->update(['address' => $input['address'], 
                                                                              'phone_number' => $input['phone_number'], 
                                                                              'gender' => $input['gender'], 
                                                                              'place_birth' => $input['place_birth'], 
                                                                              'date_birth' => $input['date_birth'], 
                                                                              'order_child' => $input['order_child'], 
                                                                              'amount_sibling' => $input['amount_sibling'], 
                                                                              'religion' => $input['religion'], 
                                                                              'biological_mother_name' => $input['biological_mother_name'],
                                                                              'father_name' => $input['father_name'], 
                                                                              'parent_address' => $input['parent_address']]);

        $upload = Upload::whereRegistrantId(Auth::user()->registrant->id)->update(['photo' => $input['photo'], 
                                                                                   'ktp' => $input['ktp'], 
                                                                                   'last_certificate' => $input['last_certificate']]);
 
        return redirect()->route('registrants.index')
                        ->with('success','Data diri berhasil disimpan');
    }
}
