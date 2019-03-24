<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

// A controller for querying data for the Admin Response Dashboard
class adminResponseDashboard extends Controller {

    public function statsResponseDashboard(){

        $numResponses = DB::table('responses')->count();

        $numResponses = DB::table('responses')->distinct('userID')->count('userID');

        return view('cpResponseDashboard')->with('stats', ['numResponses' => $numResponses]);
    }

}
