<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Vocational;
use App\Http\Models\Subvocational;
use Carbon;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $i = 0;
        $data = Subvocational::with('vocational')->get();
        $date_now = Carbon\Carbon::now(7)->toDateTimeString();
        $available = Subvocational::where('final_registration_date', '>', $date_now)->get();

        return view('index', compact('data', 'available', 'i'));
    }

}
