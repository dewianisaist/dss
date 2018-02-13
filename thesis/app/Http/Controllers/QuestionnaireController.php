<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\User;
use App\Http\Models\Choice;
use App\Http\Models\Criteria;
use Auth;
use Carbon;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_id = Auth::user()->roleId();
        $user = User::find(Auth::user()->id);
        $data = Choice::where('user_id', '=', $user->id)->first();

        if ($role_id == 3 || $role_id == 4 || $role_id == 5 ||$role_id == 6) {
            if ($user->id == 1) {
                return redirect()->route('questionnaire.create')
                                ->with('failed','Maaf, peneliti tidak perlu mengisi kuesioner ini.
                                        Apapun yang disubmit tidak akan tersimpan dalam database');
            }

            if ($data == null) {
                return redirect()->route('questionnaire.create');
            } else {
                $i = 0;
                $j = 0;

                $data_standart = Choice::select('choice.*', 'criterias.*')
                                        ->join('criterias','criterias.id','=','choice.criteria_id')
                                        ->where('choice.suggestion', '=', '0')
                                        ->where('choice.user_id', '=', $user->id)
                                        ->where('criterias.step', '=', '1')
                                        ->where('criterias.status', '=', '1')
                                        ->orderBy('criterias.id','DESC')->get();

                $data_suggestion = Choice::select('choice.*', 'criterias.*')
                                        ->join('criterias','criterias.id','=','choice.criteria_id')
                                        ->where('choice.suggestion', '=', '1')
                                        ->where('choice.user_id', '=', $user->id)
                                        ->where('criterias.step', '=', '2')
                                        ->where('criterias.status', '=', '1')
                                        ->orderBy('criterias.id','ASC')->get();

                return view('questionnaire.index', compact('data_standart', 'data_suggestion', 'i', 'j'));
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
    public function create(Request $request)
    {
        $role_id = Auth::user()->roleId();
        $user = User::find(Auth::user()->id);
        $data = Choice::where('user_id', '=', $user->id)->first();
        
        if ($role_id == 3 || $role_id == 4 || $role_id == 5 ||$role_id == 6) {
            if ($data != null) {
                return redirect()->route('questionnaire.index');
            } else {
                $i = 0;
                $criteria = Criteria::where('description','<>','null')
                                        ->where('step','=','1')
                                        ->where('status','=','1')
                                        ->whereNotIn('id', function($query){
                                            $query->select('criteria_id')
                                            ->from(with(new Choice)->getTable())
                                            ->where('suggestion', 1);
                                        })
                                        ->orderBy('id','DESC')->get();
                                        
                return view('questionnaire.create',compact('criteria', 'i'));
            }
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
        $user = User::find(Auth::user()->id);

        if ($user->id == 1) {
            return redirect()->route('questionnaire.create')
                             ->with('failed','Maaf, peneliti tidak perlu mengisi kuesioner ini.
                                    Apapun yang disubmit tidak akan tersimpan dalam database');
        }

        $input = $request->all();
        $valid = true;

        $optional = array();
        $i = 0;
        foreach ($input["criteriamore"] as $crit) {
            if (($crit != "") && ($input["descriptionmore"][$i] != "")) {
                $optional[$i]["criteria"] = $crit;
                $optional[$i]["description"] = $input["descriptionmore"][$i];
            } else if (($crit == "") && ($input["descriptionmore"][$i] == "")) {

            } else {
                $valid = false;
                break;
            }
            $i = $i + 1;
        }

        $choices = array();
        if ($valid) {
            $criteria = Criteria::where('description','<>','null')
                                    ->where('step','=','1')
                                    ->where('status','=','1')
                                    ->whereNotIn('id', function($query){
                                        $query->select('criteria_id')
                                        ->from(with(new Choice)->getTable())
                                        ->where('suggestion', 1);
                                    })
                                    ->orderBy('id','DESC')->lists('id');
            
            foreach ($criteria as $value) {
                if (!array_key_exists($value,$input)) {
                    $valid = false;
                    break;
                } else {
                    $choices[$value] = $input[$value];
                }
            }
        }

        if ($valid) {
            foreach ($choices as $criteriaid=>$option) {
                $data["user_id"] = $user->id;
                $data["criteria_id"] = $criteriaid;
                $data["option"] = $option;
                $data["suggestion"] = 0;
                Choice::create($data);
            }
            
            foreach ($optional as $optionalCriteria) {
                $dataoptional["name"] = $optionalCriteria["criteria"];
                $dataoptional["description"] = $optionalCriteria["description"];
                $dataoptional["step"] = 2;
                $dataoptional["status"] = 1;
                $dataoptional["created_at"] = Carbon\Carbon::now(7)->toDateTimeString();
                $dataoptional["updated_at"] = $dataoptional["created_at"];
                $suggest = Criteria::create($dataoptional);

                $optionalChoice["user_id"] = $user->id;
                $optionalChoice["criteria_id"] = $suggest->id;
                $optionalChoice["option"] = 1;
                $optionalChoice["suggestion"] = 1;

                Choice::create($optionalChoice);
            }

            return redirect()->route('questionnaire.index')
                             ->with('success','Selamat Anda berhasil mengisi kuesioner kriteria. 
                             Data yang sudah diisikan tidak dapat diubah.');
        } else {
            return redirect()->route('questionnaire.create')
                             ->with('failed','Maaf! Semua pilihan kriteria harus diisi.');
        }
    }
}