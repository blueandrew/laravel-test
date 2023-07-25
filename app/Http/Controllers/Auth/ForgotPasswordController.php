<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserInfo;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Hash;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function index()
    {
        return view('auth.passwords.reset-new');
    }

    public function resetPassword(Request $request){
        $username =  $request->input('username');
        $email =  $request->input('email');

        $userInfo  = UserInfo::where('username', $username)
                                ->where('email', $email)
                                ->first();
        if($userInfo){
            $usre_id = $userInfo->id;
            $new_password = "password";
            $request_user_id = UserInfo::findOrFail($usre_id)
                        ->update(['password'=>Hash::make($new_password)]);
            
            if($request_user_id>0){
                return view('webReplace',[
                        'messageTilte' => '訊息通知',
                        'message' => '密碼重製成功, 密碼為:',
                        'password' => $new_password,
                        'url' =>'/login',
                        'urlname' =>'登入',
                ]);
            }else{
                return redirect()->route('home');
            }

        }else{
            return redirect()->route('home');
        }

    }
}
