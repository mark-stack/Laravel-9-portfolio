<?php

namespace App\Http\Controllers;

use App\Models\Cheatsheet;
use App\Services\ApiJobsService;

class FrontendController extends Controller
{

    public function landing(){

        return view('frontend.landing');
    }

    public function jobs(){

        //Get Jobs from API
        $jobs = (new ApiJobsService)->callApi();

        return view('frontend.jobs',compact('jobs'));
    }

    public function socialLoginRememberProject($name,$social){

        //'name' will be URL path. e.g 'socials-login'
        session(['project' => $name]);
        
        return redirect('/auth/redirect/'.$social);

    }

    public function cheatsheets(){

        $all_cheatsheets = Cheatsheet::all();

        return view('frontend.cheatsheets',compact('all_cheatsheets'));
    }

}
