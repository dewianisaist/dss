<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Criteria;
use Auth;

class PreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $role_id = Auth::user()->roleId();
        $preferences = Criteria::orderBy('id','DESC')->paginate(10);
        if ($role_id == 3) {
            return view('preferences.index',compact('preferences'))
                ->with('i', ($request->input('page', 1) - 1) * 10);
        } else {
            return redirect()->route('profile_users.show');
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
        $preference = Criteria::find($id);
        return view('preferences.show',compact('preference'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $preference = Criteria::find($id);
        return view('preferences.edit',compact('preference'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'preference' => 'required',
            'max_min' => 'required',
        ]);
 
        Criteria::find($id)->update($request->all());
 
        return redirect()->route('preferences.index')
                         ->with('success','Tipe preferensi berhasil disimpan');
    }
}
