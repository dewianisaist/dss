<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Registration;
use App\Http\Models\Subvocational;
use App\Http\Models\Registrant;
use App\Http\Models\User;
use App\Http\Models\EducationalBackground;
use DB;
use Auth;
use Carbon;

class RegistrationController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
        $user = User::with('registrant')->find(Auth::user()->id);        
        $educational_background = EducationalBackground::whereRegistrantId($user->registrant->id)->first();
        $registration = Registration::whereRegistrantId($user->registrant->id)->first();
        
        if ($user->registrant == null) {
            return redirect()->route('registrants.edit')
                             ->with('failed','Maaf, silahkan lengkapi data diri Anda dahulu.');
        } elseif ($educational_background == null) {
            return redirect()->route('educational_background.index')
                             ->with('failed','Maaf, silahkan tambahkan Riwayat Pendidikan Anda dahulu.');
        } elseif ($registration == null) {
            return redirect()->route('registration.create');
        } else {
            $registrations = Registration::with('subvocational')->whereRegistrantId($user->registrant->id)
                                                                ->orderBy('register_date','DESC')->paginate(10);
            return $registrations;
            // return view('registration.index',compact('registrations'))
            //     ->with('i', ($request->input('page', 1) - 1) * 10);
        }
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       $subvocational = Subvocational::lists('name','id');
       
       return view('registration.create',compact('subvocational'));
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
        'sub_vocational_id' => 'required',
       ]);

       $input = $request->all();
       $user = User::with('registrant')->find(Auth::user()->id);
       $input['registrant_id'] = $user->registrant->id;
       $input['register_date'] = Carbon\Carbon::now()->toDateTimeString();
       $registration = Registration::create($input);

       return redirect()->route('registration.index')
                        ->with('success','Selamat Anda berhasil melakukan pendaftaran pelatihan.');
   }
}
