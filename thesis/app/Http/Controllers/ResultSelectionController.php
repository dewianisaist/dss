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
                                ->orderBy('selections.id','DESC')
                                ->paginate(10);

                                // return $data;
        return view('result_selection.index',compact('data'))
                    ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Selection::select('selections.id AS ID_SELECTION', 'users.id AS ID_USER', 'registrants.id AS ID_REGISTRANT',
                            'users.*', 'registrants.*', 'selections.*')
                            ->join('registrations', 'registrations.id', '=', 'selections.registration_id')
                            ->join('registrants', 'registrants.id', '=', 'registrations.registrant_id')
                            ->join('users', 'users.id', '=', 'registrants.user_id')
                            ->where('selections.id', '=', $id)
                            ->first();
        // return $profile;

        $educational_background = EducationalBackground::with('education')
                                                        ->where('registrant_id', '=', $profile->ID_REGISTRANT)
                                                        ->orderBy('education_id','ASC')
                                                        ->get();
        // return $educational_background;

        $course_experience = CourseExperience::with('course')
                                                ->where('registrant_id', '=', $profile->ID_REGISTRANT)
                                                ->get();
        // return $course_experience;

        $upload = Upload::where('registrant_id', '=', $profile->ID_REGISTRANT)->get();
        return $upload;

        $registration = Registration::select('registrations.id AS ID_REGISTRATION', 'selections.id AS ID_SELECTION', 
                                        'selection_schedules.id AS ID_SSCHEDULE', 'sub_vocationals.id AS ID_SUBVOC',
                                        'registrations.*', 'selections.*', 'selection_schedules.*', 'sub_vocationals.*')
                                        ->join('selections', 'selections.registration_id', '=', 'registrations.id')
                                        ->join('selection_schedules', 'selection_schedules.id', '=', 'selections.selection_schedule_id')
                                        ->join('sub_vocationals', 'sub_vocationals.id', '=', 'selection_schedules.sub_vocational_id')
                                        ->where('registrant_id', '=', $profile->ID_REGISTRANT)
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
                                ->get();
        return $criterias;
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
        //
    }
}
