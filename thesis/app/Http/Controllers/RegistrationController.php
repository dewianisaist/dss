<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Registration;
use App\Http\Models\Subvocational;
use App\Http\Models\User;
use App\Http\Models\Selection;
use App\Http\Models\SelectionSchedule;
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
        $role_id = Auth::user()->roleId();
        $user = User::with('registrant')->find(Auth::user()->id); 

        if ($role_id == 2) { 
            if ($user->registrant == null) {
                return redirect()->route('registrants.edit')
                                ->with('failed','Maaf, silahkan lengkapi data diri Anda dahulu.');
            }

            $registration = Registration::whereRegistrantId($user->registrant->id)->first();

            $selection = Selection::join('registrations', 'registrations.id', '=', 'selections.registration_id')
                                    ->where('registrations.registrant_id', '=', $user->registrant->id)
                                    ->orderBy('registrations.register_date', 'DESC')
                                    ->first();

            if ($registration == null) {
                return redirect()->route('registration.create');
            } elseif ($selection->status <> '') {
                return redirect()->route('registration.create');
            } else {
                $selections = Selection::join('registrations', 'registrations.id', '=', 'selections.registration_id')
                                    ->join('sub_vocationals', 'sub_vocationals.id', '=', 'registrations.sub_vocational_id')
                                    ->where('registrations.registrant_id', '=', $user->registrant->id)
                                    ->orderBy('register_date','DESC')->paginate(5);

                $selection_schedule = Selection::join('registrations', 'registrations.id', '=', 'selections.registration_id')
                                            ->join('sub_vocationals', 'sub_vocationals.id', '=', 'registrations.sub_vocational_id')
                                            ->join('selection_schedules', 'selection_schedules.id', '=', 'selections.selection_schedule_id')
                                            ->where('registrations.registrant_id', '=', $user->registrant->id)
                                            ->orderBy('register_date','DESC')->first();

                return view('registration.index',compact('selections', 'selection_schedule'))
                    ->with('i', ($request->input('page', 1) - 1) * 5);
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
            }
            
            $date_now = Carbon\Carbon::now(7)->toDateTimeString();
            $subvocational = Subvocational::where('final_registration_date', '>', $date_now)
                                            ->lists('name','id');
            $selections = Selection::join('registrations', 'registrations.id', '=', 'selections.registration_id')
                                    ->where('registrations.registrant_id', '=', $user->registrant->id)
                                    ->where(function($query){
                                        $query->whereNull('selections.status')
                                              ->orWhere('selections.status', '=', '');
                                    })
                                    ->count();
                                    
            if ($selections > 0) {
                return redirect()->route('registration.index');
            } else {
                return view('registration.create',compact('subvocational'));
            }
        }
        return redirect()->route('profile_users.show'); 
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
        $input['register_date'] = Carbon\Carbon::now(7)->toDateTimeString();

        $selectionData = array();
        $schedule = SelectionSchedule::whereSubVocationalId($input['sub_vocational_id'])
                                    ->where('selection_schedules.date', '>', $input['register_date'])
                                    ->orderBy('selection_schedules.date', 'ASC')
                                    ->first();
        
        if ($schedule == null) {
            return redirect()->route('registration.create')
                            ->withInput($request->only('sub_vocational_id', 'remember'))
                            ->withErrors([
                                'sub_vocational_id' => "Silahkan hubungi Administrator. Jadwal seleksi belum tersedia."
                            ]);
        } else {
            $selectionData['selection_schedule_id'] = $schedule->id;
            $selectionData['created_at'] = $input['register_date'];
            $selectionData['updated_at'] = $input['register_date'];

            $registration = Registration::create($input);

            $selectionData['registration_id'] = $registration->id;
            $selection = Selection::create($selectionData);
            
            return redirect()->route('registration.index')
                             ->with('success','Selamat Anda berhasil melakukan pendaftaran. 
                                Silahkan Anda melakukan seleksi sesuai dengan jadwal yang sudah ditentukan.');
        }
    }
}
