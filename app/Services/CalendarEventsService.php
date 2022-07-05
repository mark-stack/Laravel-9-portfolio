<?php

namespace App\Services;
use App\Models\Event;

class CalendarEventsService {

    public function getAjaxEvents($request,$user): array
    {
  
        $data = Event::query()
        ->whereDate('start', '>=', $request->start)
        ->whereDate('end',   '<=', $request->end)
        ->where('user_id',$user->id)
        ->get(['id', 'title', 'start', 'end','user_id']);

        return $data;

    }

    public function getSavedEvents($user):array{
        $events = array();
        $all = Event::query()
        ->where('user_id',$user->id)
        ->get(['id', 'title', 'start', 'end','user_id']);
    
        foreach($all as $item){
            $events[] = [
                'title' => $item->title,
                'start' => $item->start,
                'end' => $item->end,
                'user_id' => $item->user_id,
                'id' => $item->id
            ];
        }

        return $events;
    }

    public function ajaxEventType($request):string {

        switch ($request->type) {
            
            case 'add':
               $event = Event::create([
                   'title' => $request->title,
                   'start' => $request->start,
                   'end' => $request->end,
                   'user_id' => $request->user_id,
               ]);
  
               //return response()->json($event);
               return $event;
              break;
   
            case 'update':
 
                 $event = Event::find($request->id)->update([
                     'title' => $request->title,
                     'start' => $request->start,
                     'end' => $request->end
                 ]);
     
                 //return response()->json($event);
                 return $event;
                 break;
   
            case 'delete':
               $event = Event::find($request->id)->delete();
   
               //return response()->json($event);
               return $event;
              break;
              
            default:
              # code...
              break;
         }
    }


}