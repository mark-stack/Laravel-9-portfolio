<?php

namespace App\Services;

class ApiJobsService {

    public function callApi(): array
    {
  
        try{
            $url = 'https://remoteok.com/api';
            $data = file_get_contents($url); // put the contents of the file into a variable
            $result_raw = json_decode($data);
            $remove_first = array_slice($result_raw,1); //Remove 1st item which is just a message
            $first_fifty = array_slice($remove_first,0,50,true);
            $result_array = [];
            foreach($first_fifty as $i){
                $result_array[$i->id] = (array) $i;
            }
            $jobs = $result_array;

        } catch(\Exception $e){
            $jobs = [];
        }

        return $jobs;
    }
}