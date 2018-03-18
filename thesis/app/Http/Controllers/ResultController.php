<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\User;
use App\Http\Models\Selection;
use Auth;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_id = Auth::user()->roleId();
        $i = 0;
        $result = Selection::select('selections.*', 'users.identity_number','users.name AS name_registrant', 'selection_schedules.date', 
                                        'selection_schedules.time', 'sub_vocationals.name AS name_sub_vocational')
                                    ->join('registrations', 'registrations.id', '=', 'selections.registration_id')
                                    ->join('registrants', 'registrants.id', '=', 'registrations.registrant_id')
                                    ->join('users', 'users.id', '=', 'registrants.user_id')
                                    ->join('selection_schedules', 'selection_schedules.id', '=', 'selections.selection_schedule_id')
                                    ->join('sub_vocationals', 'sub_vocationals.id', '=', 'selection_schedules.sub_vocational_id')
                                    ->where('selections.status', '=', 'Diterima')
                                    ->orWhere('selections.status', '=', 'Tidak Diterima')
                                    ->orderBy('selections.ranking','ASC')
                                    ->get();

        if ($role_id == 2) {
            $user = User::with('registrant')->find(Auth::user()->id); 

            if ($user->registrant == null) {
                return redirect()->route('registrants.edit')
                                ->with('failed','Maaf, silahkan lengkapi data diri Anda dahulu.');
            }

            return view('result.index_registrant',compact('result','i'));
        } elseif ($role_id == 1 || $role_id == 3 || $role_id == 4 || $role_id == 5 ||$role_id == 6) {
            return view('result.index_admin',compact('result','i'));
        } else {
            return redirect()->route('profile_users.show');
        }
    }
}
