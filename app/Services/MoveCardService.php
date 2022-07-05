<?php

namespace App\Services;

use App\Models\Project;

class MoveCardService {

    public function move(Project $project, string $direction): void
    {
  
        //Current position
        $current_position = $project->position;

        //UP
        if($direction == 'up'){
            //Proposed position
            $proposed_position = $current_position - 1;

            //Can only lower number if proposed is above zero
            if($proposed_position > 0){

                //Look for an existing project with this position number, then swap
                $swapped_project = Project::where('position',$proposed_position)->first();

                if($swapped_project){
                    //This project
                    $project->position = $proposed_position;
                    $project->save();

                    //Swapped project
                    $swapped_project->position = $current_position;
                    $swapped_project->save();
                }
            }
        }
        //DOWN
        elseif($direction == 'down'){
            //Proposed position
            $proposed_position = $current_position + 1;
        
            //Look for an existing project with this position number, then swap
            $swapped_project = Project::where('position',$proposed_position)->first();
    
            if($swapped_project){
                //This project
                $project->position = $proposed_position;
                $project->save();
    
                //Swapped project
                $swapped_project->position = $current_position;
                $swapped_project->save();
            }
        }

    }

}