<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\EducationalBackground;
use App\Http\Models\Education;
use App\Http\Models\Registrant;
use App\Http\Models\User;
use DB;
use Auth;

class EducationalBackgroundController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
        $user = User::with('registrant')->find(Auth::user()->id);
        
        if ($user->registrant == null) {
            return redirect()->route('registrants.edit')
                             ->with('failed','Maaf, silahkan lengkapi data diri Anda dahulu.');
        } else {
            $educational_backgrounds = EducationalBackground::with('education')->whereRegistrantId($user->registrant->id)
                                                                               ->orderBy('education_id','DESC')->paginate(10);
            
            return view('educational_background.index',compact('user', 'educational_backgrounds'))
                        ->with('i', ($request->input('page', 1) - 1) * 10);
        }
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
    $education = Education::select(DB::raw('CONCAT(stage, " - ", major) AS jenjang_jurusan'), 'id')
                                       ->lists('jenjang_jurusan', 'id');

    return view('educational_background.create',compact('education'));
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
        'name_institution' => 'required',
        'education_id' => 'required',        
        'graduation_year' => 'required',
       ]);

       $input = $request->all();
       $user = User::with('registrant')->find(Auth::user()->id);
       $input['registrant_id'] = $user->registrant->id;
       $educational_background = EducationalBackground::create($input);

       return redirect()->route('educational_background.index')
                        ->with('success','Riwayat Pendidikan berhasil ditambahkan.');
   }

    /**
    * Display the specified resource.
    *
    * @param  int  $education_id, $name_institution, $graduation_year
    * @return \Illuminate\Http\Response
    */
    public function show($education_id, $name_institution, $graduation_year)
    {
        $educational_background = EducationalBackground::with('education')
                                                        ->where('education_id', $education_id)
                                                        ->where('name_institution', $name_institution)
                                                        ->where('graduation_year', $graduation_year)
                                                        ->first();

        return view('educational_background.show',compact('educational_background'));
    }
 
   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $education_id, $name_institution, $graduation_year
    * @return \Illuminate\Http\Response
    */
   public function edit($education_id, $name_institution, $graduation_year)
   {
        $educational_background = EducationalBackground::where('education_id', $education_id)
                                                        ->where('name_institution', $name_institution)
                                                        ->where('graduation_year', $graduation_year)->first();
        $education = Education::select(DB::raw('CONCAT(stage, " - ", major) AS jenjang_jurusan'), 'id')
                                                ->lists('jenjang_jurusan', 'id');
        $educationchoosen = EducationalBackground::where('education_id', $educational_background)->value('education_id');

        return view('educational_background.edit',compact('educational_background','education', 'educationchoosen'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $education_id, $name_institution, $graduation_year
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $education_id, $name_institution, $graduation_year)
   {
        $this->validate($request, [
            'name_institution' => 'required',
            'education_id' => 'required',        
            'graduation_year' => 'required',
        ]);   

       $input = $request->except('_method', '_token');
       $user = User::with('registrant')->find(Auth::user()->id);
       $input['registrant_id'] = $user->registrant->id;
       EducationalBackground::where('education_id', $education_id)
                            ->where('name_institution', $name_institution)
                            ->where('graduation_year', $graduation_year)
                            ->update($input);

       return redirect()->route('educational_background.index')
                        ->with('success','Riwayat pendidikan berhasil diedit');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $education_id, $name_institution, $graduation_year
    * @return \Illuminate\Http\Response
    */
   public function destroy($education_id, $name_institution, $graduation_year)
   {
       EducationalBackground::where('education_id', $education_id)
                            ->where('name_institution', $name_institution)
                            ->where('graduation_year', $graduation_year)
                            ->delete();

       return redirect()->route('educational_background.index')
                        ->with('success','Riwayat pendidikan berhasil dihapus');
   }
}
