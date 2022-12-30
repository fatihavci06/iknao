<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    //
    public function handleProviderCallback()
    {
        //

        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('back.giris');
        }
        // only allow people with @company.com to login
        if(explode("@", $user->email)[1] !== 'gmail.com'){
            return redirect()->to('/');
        }
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();

        if($existingUser){
            // log them in


            auth()->guard('yonetim')->login($existingUser, false);

        } else {
            return redirect()->route('back.giris')->with(['false'=>'Kullanıcı bulunamadı']);
            // create a new user

            $newUser                  = new User;
            $newUser->firstname=$user->name;
            $newUser->lastname=$user->name;
            $newUser->email           = $user->email;
            $newUser->google_id       = $user->id;


            $newUser->save();

            Auth::guard('yonetim')->login($existingUser);
        }
        return redirect()->route('back.index');
    }
    public function redirectToProvider()
    {
        //

        return Socialite::driver('google')->with(["prompt" => "select_account"])->redirect();
    }
}
