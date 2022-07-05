<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Services\MovecardService;

class AdminController extends Controller
{

    public function dashboard()
    {
        $projects = project::all();

        return view('backend.admin_dashboard',compact('projects'));
    }

    public function createProject(Request $request){

        $data = $request->all();

        Project::create($data);

        return back()->with('success_create','Successfully created project');
    }

    public function projectPositionUp($id){ 

        //Get project
        $project = Project::findorfail($id);

        //Service class to perform moving
        (new MovecardService())->move($project,'up');
      
        return back();
    }

    public function projectPositionDown($id){ 

        //Get project
        $project = Project::findorfail($id);

        //Service class to perform moving
        (new MovecardService())->move($project,'down');
      
        return back();
    }
}
