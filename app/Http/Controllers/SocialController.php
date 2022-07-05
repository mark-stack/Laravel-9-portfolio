<?php
/*
S.O.L.I.D design principals:
(S)ingle purpose: Direct logins from Google, Linkedin etc
(O)pen/close: What is the main dynamic variable to extend? Adding social networks
(L)iskov substitution: Make an Interface, and typehint the variables in the functions to prove alignment,
(I)nterface segregation: Dont make a mega interface. Make several then you can have interface1, interface2, ....
(D)ependency inversion: High level functions shouldn't rely on low level functions
*/

namespace App\Http\Controllers;
 
use Socialite;
use App\Models\User;
use Auth;

class SocialController extends Controller{

    public function redirect($social){

        return Socialite::driver($social)->redirect();
    }

    public function callback($social){

        $getInfo = Socialite::driver($social)->stateless()->user();

        $user = $this->createUser($getInfo);

        auth()->login($user);

        //Admin
        if(Auth::user()->isAdmin()){
            return redirect()->to('/admin');
        }

        //General user
        if(Auth::user()->isUser()){
            //check session for remembering project from landing page
            $project = session('project');

            if($project){
                return redirect('/user/'.$project);
            }
            else{
                return redirect('/user');
            }
        }
    }
   
    function createUser($getInfo){
    
        $user = User::where('email', $getInfo->email)->first();
       
        if (!$user) {
            
            $first_name = explode(' ',$getInfo->name)[0];
            $last_name = explode(' ',$getInfo->name)[1];

            $user = User::create([
                'name'     => $getInfo->name,
                'email'    => $getInfo->email,
                'first_name' => $first_name,
                'last_name' => $last_name,
            ]);
        }

        return $user;
    }
}

