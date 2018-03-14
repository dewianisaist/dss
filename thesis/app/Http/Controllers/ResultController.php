<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\User;
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

        if ($role_id == 2) {
            $user = User::with('registrant')->find(Auth::user()->id); 

            if ($user->registrant == null) {
                return redirect()->route('registrants.edit')
                                ->with('failed','Maaf, silahkan lengkapi data diri Anda dahulu.');
            }

            return view('result.index_registrant');
        } elseif ($role_id == 1 || $role_id == 3 || $role_id == 4 || $role_id == 5 ||$role_id == 6) {
            return view('result.index_admin');
        } else {
            return redirect()->route('profile_users.show');
        }
    }
}
