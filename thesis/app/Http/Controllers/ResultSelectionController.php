<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\ResultSelection;
use App\Http\Models\Selection;
use App\Http\Models\Criteria;
use App\Http\Models\Choice;
use App\Http\Models\EducationalBackground;
use App\Http\Models\CourseExperience;
use App\Http\Models\Upload;
use App\Http\Models\Registration;
use Auth;

class ResultSelectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Selection::select('selections.*', 'users.name AS name_registrant', 'selection_schedules.date', 
                                  'selection_schedules.time', 'sub_vocationals.name AS name_sub_vocational')
                                ->join('registrations', 'registrations.id', '=', 'selections.registration_id')
                                ->join('registrants', 'registrants.id', '=', 'registrations.registrant_id')
                                ->join('users', 'users.id', '=', 'registrants.user_id')
                                ->join('selection_schedules', 'selection_schedules.id', '=', 'selections.selection_schedule_id')
                                ->join('sub_vocationals', 'sub_vocationals.id', '=', 'selection_schedules.sub_vocational_id')
                                ->where('selections.status', '=', '')
                                ->orderBy('selections.id','DESC')
                                ->paginate(10);
        
        // return $data;

        return view('result_selection.index',compact('data', 'result_selection'))
                    ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for assessment the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assessment($id)
    {
        $i = 0;
        $j = 0;

        $data = Selection::select('selections.id AS ID_SELECTION', 'users.id AS ID_USER', 'registrants.id AS ID_REGISTRANT',
                            'users.*', 'registrants.*', 'selections.*')
                            ->join('registrations', 'registrations.id', '=', 'selections.registration_id')
                            ->join('registrants', 'registrants.id', '=', 'registrations.registrant_id')
                            ->join('users', 'users.id', '=', 'registrants.user_id')
                            ->where('selections.id', '=', $id)
                            ->first();
        // return $data;

        $check_result = ResultSelection::with('selection')
                                            ->where('selection_id', '=', $data->ID_SELECTION)
                                            ->first();
        // return $check_result;

        $educational_background = EducationalBackground::with('education')
                                                        ->where('registrant_id', '=', $data->ID_REGISTRANT)
                                                        ->orderBy('education_id','DESC')
                                                        ->get();
        // return $educational_background;

        $course_experience = CourseExperience::with('course')
                                                ->where('registrant_id', '=', $data->ID_REGISTRANT)
                                                ->get();
        // return $course_experience;

        $upload = Upload::where('registrant_id', '=', $data->ID_REGISTRANT)->first();
        // return $upload;

        $registration = Registration::select('registrations.id AS ID_REGISTRATION', 'selections.id AS ID_SELECTION', 
                                        'selection_schedules.id AS ID_SSCHEDULE', 'sub_vocationals.id AS ID_SUBVOC',
                                        'registrations.*', 'selections.*', 'selection_schedules.*', 'sub_vocationals.*')
                                        ->join('selections', 'selections.registration_id', '=', 'registrations.id')
                                        ->join('selection_schedules', 'selection_schedules.id', '=', 'selections.selection_schedule_id')
                                        ->join('sub_vocationals', 'sub_vocationals.id', '=', 'selection_schedules.sub_vocational_id')
                                        ->where('registrant_id', '=', $data->ID_REGISTRANT)
                                        ->orderBy('ID_SELECTION','DESC')
                                        ->get();
        // return $registration;

        $criterias = Criteria::where('step', '=', '2')
                                ->where('status', '=', '1')
                                ->where('description', '<>', null)
                                ->whereNotIn('id', function($query){
                                    $query->select('criteria_id')
                                    ->from(with(new Choice)->getTable())
                                    ->where('suggestion', 1);
                                })
                                ->orderBy('id','DESC')->get();
        
        $return_data = array();
        // return $data->ID_SELECTION;

        foreach ($criterias as $criteria) {
            $single_data = array();
            $single_data["criteria"] = $criteria;
            $result_selection = ResultSelection::where('selection_id', '=', $data->ID_SELECTION)
                                                ->where('criteria_id', '=', $criteria->id)
                                                ->first();
            if ($result_selection == null) {
                $single_data["value"] = null;
            } else {
                $single_data["value"] = $result_selection;
            }
            $return_data[] = $single_data;
        }
        //  return $return_data;

        return view('result_selection.assessment',compact('data','check_result','educational_background','course_experience','upload','registration','return_data','i','j'));
    }

    /**
     * Assess the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $input = $request->all();
        // return $input;

        $criterias = Criteria::where('step', '=', '2')
                                ->where('status', '=', '1')
                                ->where('description', '<>', null)
                                ->whereNotIn('id', function($query){
                                    $query->select('criteria_id')
                                    ->from(with(new Choice)->getTable())
                                    ->where('suggestion', 1);
                                })
                                ->orderBy('id','DESC')
                                ->lists('id');
        
        //  return $criterias;
        foreach ($criterias as $criteria) {
            $result_selection = ResultSelection::where('selection_id', '=', $id)
                                                ->where('criteria_id', '=', $criteria)
                                                ->first();
            
            if ($input[$criteria] != ""){
                $data["selection_id"] = $id;
                $data["criteria_id"] = $criteria;
                $data["value"] = $input[$criteria];
                if ($result_selection == null) {
                    ResultSelection::create($data);
                } else {
                    ResultSelection::where('selection_id', '=', $id)
                                    ->where('criteria_id', '=', $criteria)
                                    ->update($data);
                }
            } else {
                ResultSelection::where('selection_id', '=', $id)
                                ->where('criteria_id', '=', $criteria)
                                ->delete();
            }
        }
        return redirect()->route('result_selection.index')
                         ->with('success','Penilaian berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clear($id)
    {
        ResultSelection::where('selection_id', '=', $id)->delete();

        return redirect()->route('result_selection.assessment', $id)
                         ->with('success','Penilaian berhasil dihapus');
    }

    /**
     * Count all assessment of the resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function count()
    {
        $selections = Selection::select('selections.*', 'users.name AS name_registrant', 'selection_schedules.date', 
                                        'selection_schedules.time', 'sub_vocationals.name AS name_sub_vocational')
                                    ->join('registrations', 'registrations.id', '=', 'selections.registration_id')
                                    ->join('registrants', 'registrants.id', '=', 'registrations.registrant_id')
                                    ->join('users', 'users.id', '=', 'registrants.user_id')
                                    ->join('selection_schedules', 'selection_schedules.id', '=', 'selections.selection_schedule_id')
                                    ->join('sub_vocationals', 'sub_vocationals.id', '=', 'selection_schedules.sub_vocational_id')
                                    ->where('selections.status', '=', '')
                                    ->orderBy('selections.id','DESC')
                                    ->get();
        // return $selections;

        foreach ($selections as $selection){
            $criterias = Criteria::where('step', '=', '2')
                                    ->where('status', '=', '1')
                                    ->where('description', '<>', null)
                                    ->whereNotIn('id', function($query){
                                        $query->select('criteria_id')
                                        ->from(with(new Choice)->getTable())
                                        ->where('suggestion', 1);
                                    })
                                    ->orderBy('id','DESC')
                                    ->get();
            // return $criterias;

            
            foreach ($criterias as $criteria){
                $result_selection = ResultSelection::where('selection_id', '=', $selection->id)
                                                    ->where('criteria_id', '=', $criteria->id)
                                                    ->first();

                // return $result_selection;
                if ($result_selection == null) {
                    return redirect()->route('result_selection.index')
                                    ->with('failed','Hitung penilaian GAGAL! '. $selection->name_registrant . ' belum dinilai. Silahkan lakukan penilaian');
                } else {
                    return redirect()->route('result_selection.index')
                                    ->with('success','Hitung penilaian berhasil. Lihat hasil di menu "Hasil"');
                }
            }
        }
        
    }
}
