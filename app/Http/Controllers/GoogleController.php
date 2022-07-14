<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use Exception;
use App\Models\User;
class GoogleController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function redirectToGoogle()
    {
        //return ['sucess'];
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            // dd($user);
            //dd($user->user);
            //dd($user,$user->user["family_name"]);
            // $user = Socialite::driver('google')->user();
            $domine=explode('@',$user->email)[1];
            if($domine=="gvpce.ac.in")
            {
            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect('/scp');

            }else{
                $newUser = User::create([
                    'name' => $user->user["family_name"],
                    'mname' => $user->name,
                    'rollno'=>$user->user["given_name"],
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'profilepic'=>$user->user["picture"],
                    'password' => encrypt('123456')

                ]);
                Auth::login($newUser);
                return redirect('/scp');
            }
        }
        else{
            return redirect('/login')->with('status', 'Only GVPCE students allowed to login');;
        }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}


