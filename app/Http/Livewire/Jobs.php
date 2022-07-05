<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Jobs extends Component

{

    public $current_tag;
    public $jobs_init;
    public $jobs;
    
    public function mount(){

        $this->jobs = $this->jobs_init;
        $this->current_tag = '';
    }
    
    public function tag($tag){
        
        //If is "all", then display all samples
        if($tag == "all"){
            $this->jobs = $this->jobs_init;
            $this->current_tag = "";
        }
        //Loop through all projects, explode the tags, and find matches
        else{

            $all_jobs  = $this->jobs;
            $id_array = [];
            $result_array = [];
            foreach($all_jobs as $key=>$job){

                $tags = $job['tags'];
                
                //Search array
                if (in_array($tag, $tags)){
                    array_push($id_array,$key);
                    array_push($result_array,$all_jobs[$key]);
                }
            }
            
            $this->jobs = $result_array;
            $this->current_tag = $tag;
            $this->dispatchBrowserEvent('updated', true);
        }
        
    }
    
    public function render()
    {
        return view('livewire.jobs',['current_tag' => $this->current_tag]);
    }
}

