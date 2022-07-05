<?php

namespace App\Http\Controllers;

use App\Models\Plan;

class UserController extends Controller
{

    public function dashboard()
    {
        //return view('backend.user_dashboard');
        return redirect('/user/stripe-integration');
    }

    public function exampleStripe(){

        $user = Auth()->user();

        //Current subscription
        $plans = Plan::all();
        $current_subscription = null;
        foreach($plans as $plan){
            if($user->subscription($plan->name) != null){
                $current_subscription = $plan->name;
            }
        }
        
        $current_invoices = $user->invoicesIncludingPending();
        $upcoming_invoice = $user->upcomingInvoice();

        return view('backend.stripe.exampleStripe',compact('plans','user','current_subscription','current_invoices','upcoming_invoice'));
    }

    public function stripeCancel()
    {
        $user = Auth()->user();

        //Current subscription
        $plans = Plan::all();
        $current_subscription = null;
        foreach($plans as $plan){
            if($user->subscription($plan->name) != null){
                $current_subscription = $plan->name;
            }
        }

        //Cancel
        if($current_subscription){
            $user->subscription($current_subscription)->cancel();
        }

        return redirect()->route('billing');
    }

    public function stripeResume()
    {
        $user = Auth()->user();

        //Current subscription
        $plans = Plan::all();
        $current_subscription = null;
        foreach($plans as $plan){
            if($user->subscription($plan->name) != null){
                $current_subscription = $plan->name;
            }
        }

        //Resume
        if($current_subscription){
            $user->subscription($current_subscription)->resume();
        }

        return redirect()->route('billing');
    }

    public function exampleSocials(){

        return view('backend.exampleSocials');
    }

    public function internalProjects($name){

        //'name' will be URL path. e.g 'socials-login'
        return redirect('/user/'.$name);
        
    }
}
