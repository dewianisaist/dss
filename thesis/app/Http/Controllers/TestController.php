<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Registrant;
use App\Http\Models\User;
use App\Http\Models\Upload;
use App\Http\Models\Education;
use App\Http\Models\Course;
use Auth;

class TestController extends Controller
{
    public function test() {
        $data = Registrant::whereUserId(Auth::user()->id)->first();

        $upload = new Upload;
        $upload->registrant_id = $data->id;
        $upload->photo = 'photo_dewianisa.jpg';
        $upload->ktp = 'ktp_dewianisa.jpg';
        $upload->last_certificate = 'certificate_dewi.jpg';
        $upload->save();

        return $upload;
    }

    public function registrant() {
        $registrant = new Registrant;
        $registrant->user_id = Auth::user()->id;
        $registrant->address = 'Jalan Kebahagiaan Jogja 98';
        $registrant->phone_number = '087839887651';
        $registrant->gender = 1;
        $registrant->place_birth = 'Jogja';
        $registrant->date_birth = '1993-10-10';
        $registrant->order_child = 2;
        $registrant->amount_sibling = 3;
        $registrant->religion = 1;
        $registrant->biological_mother_name = 'Tumini';
        $registrant->father_name = 'Wakijan';
        $registrant->parent_address = 'Jalan Seksama Wonosobo';
        $registrant->save();

        return $registrant;
    }

    public function upload() {
        $data = Registrant::whereUserId(Auth::user()->id)->first();

        $upload = new Upload;
        $upload->registrant_id = $data->id;
        $upload->photo = 'photo_dewianisa.jpg';
        $upload->ktp = 'ktp_dewianisa.jpg';
        $upload->last_certificate = 'certificate_dewi.jpg';
        $upload->save();

        return $upload;
    }
}
