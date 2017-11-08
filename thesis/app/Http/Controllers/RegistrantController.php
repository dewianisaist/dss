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
        $user = User::with('registrant', 'registrant.upload')->find(Auth::user()->id);
        //return $user;
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
             'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'ktp' => 'required',
             'last_certificate' => 'required',
        ]);
        
        $input = $request->all();

        $user = User::find(Auth::user()->id);
        if (!empty($input['password'])) { 
            $input['password'] = Hash::make($input['password']);
        } else {
            $input['password'] = $user->password;    
        }
 
        $user->update(['name' => $input['name'], 
                        'email' => $input['email'], 
                        'password' => $input['password']]);
        
        $registrant = Registrant::firstOrCreate(['user_id' => Auth::user()->id]);
        $registrant->address = $input['address'];
        $registrant->phone_number = $input['phone_number'];
        $registrant->gender = $input['gender'];
        $registrant->place_birth = $input['place_birth'];
        $registrant->date_birth = $input['date_birth'];
        $registrant->order_child = $input['order_child'];
        $registrant->amount_sibling = $input['amount_sibling'];
        $registrant->religion = $input['religion'];
        $registrant->biological_mother_name = $input['biological_mother_name'];
        $registrant->father_name = $input['father_name'];
        $registrant->parent_address = $input['parent_address'];
        $registrant->save();

        $upload = Upload::firstOrNew(['registrant_id' => $registrant->id]);
        $photoName = '';
        if ($request->hasFile('photo')) {
            $photo = $request->input('photo');
            $extension = $request->file('photo')->getClientOriginalExtension();
            $photoName = 'photo_'.md5(Auth::user()->id).'.'.$extension;
            $destination = base_path() . '/public/uploads';
            $request->file('photo')->move($destination, $photoName);
            $upload->photo = $photoName;
        } else {
            $upload->photo = $upload->photo;
        }
        
        $upload->ktp = $input['ktp'];
        $upload->last_certificate = $input['last_certificate'];
        $upload->save();
 
        return redirect()->route('registrants.index')
                        ->with('success','Data diri berhasil disimpan');
    }
}
