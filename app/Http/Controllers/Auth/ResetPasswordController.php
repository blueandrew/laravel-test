<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Auth;
use App\Models\UserInfo;
use Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function index()
    {
        return view('member.editPassword');
    }

    public function updatePassword(Request $request){
        $validated = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $new_password = $validated['password'];
        $usre_id =  Auth::id();
        $request_user_id = UserInfo::findOrFail($usre_id)
                        ->update(['password'=>Hash::make($new_password)]);
        
        if($request_user_id>0){
            return redirect()->route('home');
        }else{
            return redirect()->route('home');
        }
    }
}
