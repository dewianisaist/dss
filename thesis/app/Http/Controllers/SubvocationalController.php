<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Subvocational;
use App\Http\Models\Vocational;

class SubvocationalController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
       $data = Subvocational::with('vocational')->orderBy('id','DESC')->paginate(10);
       return view('subvocationals.index',compact('data'))
           ->with('i', ($request->input('page', 1) - 1) * 10);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       $vocational = Vocational::lists('name','id');
       return view('subvocationals.create',compact('vocational'));
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
        'vocational_id' => 'required',
        'quota' => 'required',
        'long_training' => 'required',
        'final_registration_date' => 'required',
       ]);

       $input = $request->all();
       $subvocational = Subvocational::create($input);

       return redirect()->route('subvocationals.index')
                       ->with('success','Sub-Kejuruan berhasil dibuat');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $subvocational = Subvocational::find($id);
       return view('subvocationals.show',compact('subvocational'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
        $subvocational = Subvocational::find($id);
        $vocational = Vocational::lists('name','id');

        return view('subvocationals.edit',compact('subvocational','vocational'));
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
        'vocational_id' => 'required',
        'quota' => 'required',
        'long_training' => 'required',
        'final_registration_date' => 'required',
       ]);

       $input = $request->all();
       $subvocational = Subvocational::find($id);
       $subvocational->update($input);

       return redirect()->route('subvocationals.index')
                       ->with('success','Sub-Kejuruan berhasil diedit');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       Subvocational::find($id)->delete();
       return redirect()->route('subvocationals.index')
                       ->with('success','Sub-Kejuruan berhasil dihapus');
   }
}
