<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Event;
use App\Services\CalendarEventsService;
  
class FullCalenderController extends Controller
{

    public function index(Request $request){

        $user = Auth()->user();

        //On request, get Ajax events
        if($request->ajax()) {

            $data = (new CalendarEventsService)->getAjaxevents($request->ajax(),$user);

            return response()->json($data);
        }
        //On page load, display saved events
        else{

            $events = (new CalendarEventsService)->getSavedEvents($user);

            return view('backend.fullcalendar',['events' => $events]);
        }
        
    }
 
    public function ajax(Request $request){

        //Process "add", "update", "delete" to return an event for JSON response
        $json = (new CalendarEventsService)->ajaxEventType($request);

        return response()->json($json);
    }
}