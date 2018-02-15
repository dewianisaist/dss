<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Vocational;
use App\Http\Models\Subvocational;
use App\Http\Models\SelectionSchedule;
use Auth;

class VocationalController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $role_id = Auth::user()->roleId();
        
        if ($role_id == 1) {
            $vocationals = Vocational::orderBy('id','DESC')->paginate(10);

            return view('vocationals.index',compact('vocationals'))
                ->with('i', ($request->input('page', 1) - 1) * 10);
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
            
        if ($role_id == 1) {
            return view('vocationals.create');
        } else {
            return redirect()->route('profile_users.show');
        }
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
            'name' => 'required',
            'description' => 'required',
        ]);

        Vocational::create($request->all());

        return redirect()->route('vocationals.index')
                        ->with('success','Kejuruan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role_id = Auth::user()->roleId();
            
        if ($role_id == 1) {
            $vocational = Vocational::find($id);

            return view('vocationals.show',compact('vocational'));
        } else {
            return redirect()->route('profile_users.show');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role_id = Auth::user()->roleId();
            
        if ($role_id == 1) {
            $vocational = Vocational::find($id);

            return view('vocationals.edit',compact('vocational'));
        } else {
            return redirect()->route('profile_users.show');
        }
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
            'name' => 'required',
            'description' => 'required',
        ]);

        Vocational::find($id)->update($request->all());

        return redirect()->route('vocationals.index')
                        ->with('success','Kejuruan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $selectionschedule = Subvocational::where('vocational_id', '=', $id)
                                            ->whereIn('id', function($query){
                                                $query->select('sub_vocational_id')
                                                ->from(with(new SelectionSchedule)->getTable());
                                            })
                                            ->first();

        if ($selectionschedule == null) {
            Subvocational::where('vocational_id', '=', $id)->delete();

            Vocational::find($id)->delete();
                                        
            return redirect()->route('vocationals.index')
                             ->with('success','Kejuruan berhasil dihapus');
        } else {
            return redirect()->route('vocationals.index')
                             ->with('failed','Kejuruan tidak bisa dihapus karena sudah memiliki jadwal seleksi');
        }
        
        
    }
}
