<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;
use function GuzzleHttp\json_encode;
use App\Post;


class ReplyController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function create(Request $request)
    {
        # code...
        //dd($request->input('postid'));
        //$reply = new Reply(['user_id'=>1,'post_id'=>1,'reply'=>"qwertyuiop"]);
        $postid=$request->input('postid');
        $post = Post::findorfail($postid);
        /* $reply->user_id = 1;
        $reply->post_id=2;
        $reply->reply= "qwertyuiophkbiluilljhbjhbjh;hvccfgxflcfylfcly";
        $reply->save(); */
        $post->replies()->save(new Reply([
            'reply' => $request->input('reply'),
            'user_id'=>auth()->id()
            // other attributes...
            ]));
            return redirect('posts/'.$postid);
            //return redirect('posts');
            //return json_encode(['liked'=>0,'posts'=>"posts",'likes'=>"liked"]);
       

    }
    public function async_create(){
        //echo 'hi';
        //return  response()->json(['liked'=>0,'posts'=>"posts",'likes'=>"liked"]);
        return json_encode(['liked'=>0,'posts'=>"posts",'likes'=>"liked"]);

    }
    public function moreReplies(Request $request)
    {
        # code...
        //$reply = new Reply(['user_id'=>1,'post_id'=>1,'reply'=>"qwertyuiop"]);
        $limit = 2;
        $offset = $request->input('offset');
        $chunk = $offset * $limit;
        $more = 0;
        $replies =Post::findorfail($request->input('post_id'))->replies->skip($chunk -1)->take($limit);  //Reply::all()->skip(0)->take(5);
        //$replies =Post::findorfail(16)->replies->skip(0)->take(7);
        //dd($replies->count());
        $all_replies =  Array();
        foreach ($replies as $reply) {
            # code...
            $arr = Array();
            $replyUser = $reply->user;
            array_push($arr,$replyUser->id);
            array_push($arr,$replyUser->name);
            array_push($arr,$replyUser->email);
            array_push($arr,$reply->reply);
            array_push($arr,$reply->created_at);
            array_push($all_replies,$arr);
        }
        $replies =Post::findorfail($request->input('post_id'))->replies->skip($chunk + $limit)->take(1);
        if ($replies->count() >0) {
            # code...
            $more = 1;
        } else {
            # code...
            $more = 0;
        }
        
        
        return json_encode(['replies'=>$all_replies,"more"=>$more]);
       

    }
}
