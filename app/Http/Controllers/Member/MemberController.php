<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserInfo;
use Auth;

class MemberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('member.member');
    }

    public function updateMember(Request $request){
        $new_name = $request['name'];
        $usre_id =  Auth::id();
        $request_user_id = UserInfo::findOrFail($usre_id)
                        ->update(['name'=>$new_name]);
        if($request_user_id>0){
            return redirect()->route('member');
        }else{
            return redirect()->route('member');
        }
    }
}
