<?php

namespace App\Http\Controllers;

use App\follower;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    //
    public function follower()
    {
        # code...
       $follow = User::findOrFail(1)->followers;
       dd($follow);
    }
    public function following()
    {
        # code...
       
       $follow = Auth::User()->followerings->count();
       dd($follow);
    }
    public function followers()
    {
        # code...
       $follow = Auth::User()->followering;
       
       dd($follow);
    }
    public function follow(Request $request)
    {
        # code...
        /*$user1 = User::findOrFail(1);
        $user2 = User::findOrFail(5);
        #$user1->followering()->save($user2);
        $user1->followerings()->save($user2);
        #$follow = User::findOrFail(1)->followering;
        $follow = User::findOrFail(3)->followerings;
        dd($follow);
       $id = auth()->id();
       //$follow = User::findOrFail(1)->followers->where('follower',$id)->get();
       $follow = follower::where('follower',$id)->get();
       $follower = follower::where('follower',$id)->chunk(2,function($f){
           foreach ($f as  $v) {
               # code...
               echo "<br/>";
               echo $v->user_id;
           }
       });
       dd($follow);*/
       $user = User::findOrFail($request->input('profile'));
       $follow = Auth::User()->followerings()->save($user);
       //return redirect("/profile/".$request->input('profile'));
       return redirect()->back();
    }
    
    public function unfollow(Request $request)
    {
        # code...
        $id = $request->input('profile');
        $unfollowed = follower::where('user_id','=',$id)->delete();;
        //$follow = Auth::User()->followerings()->where('user_id','=',$id)->delete();
        //return redirect("/profile/$id");
        return redirect()->back();
       
    }
}
