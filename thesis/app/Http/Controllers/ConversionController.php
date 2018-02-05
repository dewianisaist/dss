<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Conversion;
use App\Http\Models\Criteria;
use Auth;
use DB;

class ConversionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $conversions = Conversion::with('criteria')->orderBy('id','DESC')->paginate(10);

        return view('conversions.index',compact('conversions'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $criteria = Criteria::where('status','=',1)
                            ->where('description','<>',null)
                            ->lists('name','id')
                            ->all();

        return view('conversions.create',compact('criteria'));
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
            'criteria_id' => 'required',
            'resource' => 'required',
        ]);

        $input = $request->all();
        Conversion::create($input);

        return redirect()->route('conversions.index')
                        ->with('success','Sumber nilai kriteria berhasil dibuat');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conversion = Conversion::find($id);
        $criteria = Criteria::where('status','=',1)
                            ->where('description','<>',null)
                            ->lists('name','id')
                            ->all();
        // $criteriachoosen = Conversion::where('id', $conversion)->value('name');

        return view('conversions.edit',compact('criteria', 'conversion'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Conversion::find($id)->delete();
        
        return redirect()->route('conversions.index')
                        ->with('success','Sumber nilai kriteria berhasil dihapus');
    }
}
