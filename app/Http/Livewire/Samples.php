<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;

class Samples extends Component
{

    public $projects;
    public $current_tag;

    public function mount(){
        $this->projects = Project::where('status',true)->orderBy('position')->get();
        $this->current_tag = '';
    }

    public function tag($tag){
        
        //If is "all", then display all samples
        if($tag == "all"){
            $this->projects = Project::where('status',true)->orderBy('position')->get();
            $this->current_tag = "";
        }
        //Loop through all projects, explode the tags, and find matches
        else{
            $all_projects = Project::where('status',true)->get();
            $id_array = [];
            foreach($all_projects as $project){
                //Tags array all lowercase
                $tags = explode(',',$project->category);
                $tags = array_map('strtolower', $tags);
    
                //Tag: lowercase and remove hyphens
                $tag = str_replace('-',' ',$tag);
                $tag = strtolower($tag);
    
                //Search array
                if (in_array($tag, $tags)){
                    array_push($id_array,$project->id); 
                }
            }
            
            //If 'PHP' or 'API', make all uppercase
            if($tag == 'api' || $tag == 'php'){
                $tag = strtoupper($tag);
            }
            $this->projects = Project::orderBy('position')->find($id_array);
            $this->current_tag = $tag;
            $this->dispatchBrowserEvent('updated', true);
        }
        
    }

    public function render()
    {
        return view('livewire.samples',['current_tag' => $this->current_tag]);
    }
}
