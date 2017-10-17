<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Registrant;

class RegistrantController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
       $registrants = Registrant::where
//        $vocationals = Vocational::orderBy('id','DESC')->paginate(5);
//        return view('vocationals.index',compact('vocationals'))
//            ->with('i', ($request->input('page', 1) - 1) * 5);

$roles = Role::orderBy('id','DESC')->paginate(5);
return view('roles.index',compact('roles'))
    ->with('i', ($request->input('page', 1) - 1) * 5);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
//    public function store(Request $request)
//    {
//        $this->validate($request, [
//         'name' => 'required',
//         'description' => 'required',
//        ]);

//        Vocational::create($request->all());

//        return redirect()->route('vocationals.index')
//                        ->with('success','Kejuruan berhasil dibuat');
//    }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
//    public function edit($id)
//    {
//        $vocational = Vocational::find($id);
//        return view('vocationals.edit',compact('vocational'));
//    }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
//    public function update(Request $request, $id)
//    {
//        $this->validate($request, [
//            'name' => 'required',
//            'description' => 'required',
//        ]);

//        Vocational::find($id)->update($request->all());

//        return redirect()->route('vocationals.index')
//                        ->with('success','Kejuruan berhasil diedit');
//    }

}
