
    <?php
    //$postuserid = $owners->user->id;
    $userid = $user->id;
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo csrf_token() ?>" id="meta-token"> 
    <title>Showtweets</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
         html, body {
                /* background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh; */
                margin: 0;
               /*  background-color:   rgb(21, 34, 51); */
               /*background-color:black;
               color:white;*/
               background-color:white;
               color:black;
            }
            .profile-container{
                height:400px;
                background-color:white;
                color:black;
            }
        .main-content{
            display: flex;
            position:relative;
        }
        .main-content-nav{
            width: 300px;
            background-color: skyblue;
        }
        .tweet-container-wrapper{
            display:flex;
            justify-content: center;
            align-items: center;
                width: 70%;
                margin-top:400px;
        }
        .profile-pic{
            width: 50px;
            height: 50px;
            border-radius: 100%;
            background-color:gray;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
        }
        .profile-pic-wrapper{
            padding:20px;
        }
        .each-tweet{
            display: flex;
          /*   justify-content: ; */
          border-bottom: 1px solid gray;
          margin-top: 10px;
        }
        .each-tweet-content{
             display: flex;
             border:2px solid #4a90e2;
             border-radius:10px;
        }
        .each-tweet-itm{
            margin-bottom: 20px;

        }
        .like{
            width: 30px;
            height: 30px;
            /* background-color: red; */
            border-radius: 100%;
        }
        .tweet-header{
            display: flex;
            justify-content: flex-start;
            align-items: flex-end;
        }
        .tweet-header p{
            /* margin-left: 10px; */
        }
        .tweet-footer{
            display: flex;
            align-items: flex-end;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .tweet-footer-itm{
            margin-right: 20px;

        }
        .follow-stat{
            display: flex;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .follow-stat p{
            margin-right: 10px;
        }
        .main-content-nav-container{
            margin: 20px;
        }
        .nav-header{
            border: 5px solid gray;
            margin-bottom: 15px;
        }
        .nav-options{
            border-bottom: 2px solid gray;
        }
        .nav-options-item{
            margin-bottom:40px ;
        }
        .bookmark-ntfcns{
            position: fixed;
            /* position: absolute; */
            top:90vh ;
            width: 100%;
          /*   height: 100vh; */
            background-color: orangered;
        }
        .bookmark-display{
            display: none;
        }
        /* make a tweet styking */
        .tweet-btn{
                width: 100px;
                height: 100px;
                display: flex;
                position: fixed;
                bottom: 0px;
                right: 0px;
                justify-content: center;
                align-content: center;
                background-color: skyblue;
                border-radius: 100%;
            }
            .tweet-btn-txt{
                width: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 30px;
            }
            .tweet-link{
                display: block;
            }
        /* make a tweet styling */

        .follow-btn{
            margin-left:150px;
        }
        .modal{
            position:absolute;
            top:0px;
            /* margin:20px auto; */
            width:100%;
            height:100em;
            opacity:0.5;
            background-color:black;
            /* z-index:100; */
            display:flex;
            justify-content:center;
        }
        .modal-content{
            position:absolute;
            z-index:100;
            top:0px;
            width:500px;
            height:500px;
            background-color:black;
        }
        .prof-cover-bcg{
            width: 100%;
            height: 250px;
            background-color: skyblue;
            position: absolute;
            /* left: 300px; */
            /* margin-left: 300px; */
            overflow: hidden;
            right: 0;
            padding-left: 300px;
          
        }
        .prof-cover-bcg-con{
           /* width:100%;
            position:absolute;
            margin-left:300px;*/
            overflow: hidden;
        }
        .pgrn{
                    padding-top: 150px;
            position: absolute;
            /* top: 0px; */
            padding-left: 300px;
            display: flex
        ;
            justify-content: space-between;
            align-items: flex-end;
            width: 100%;
        }
        .pgrn-img{
            padding-right: 10px;
            padding-left: 10px;
            padding-top: 7px;
            padding-bottom: 7px;
            background-color:black;
            color:white;
            text-decoration:none;
                border-top-left-radius: 40px;
                    border-top-right-radius: 40px;
                    border-bottom-left-radius: 40px;
                    border-bottom-right-radius: 40px;
                    z-index:1000;
            ;
        }
    </style>
</head>
<body>
    <div class="prof-cover-bcg-con">
                    <div class="prof-cover-bcg">
                        <h1>ccover page</h1>
                        
                    </div>
                </div>
    <div class="pgrn">
        
                            @if($user->image)
                                
                            <img src="{{ asset('storage/'.$user->image) }}" alt="" srcset=""  width="150px" height="150px" style="border-radius:100%;overflow:hidden">       
                            @else 
                                    
                                <img src="{{ asset('storage/tweetmedia/fjNWdivsubv0EWx1ONYe0RUiM5gf1KJIg74z2QI6.jpg') }}" alt="" srcset="" width="150px" height="150px" style="border-radius:100%;overflow:hidden;background-color: red;"
                                >
                            
                            @endif
                            
                            @if($user->id == $authuser->id)
            @can('update-profile',$userid)
                            
                            <a href="/edit/profile"  class="pgrn-img">edit profile</a>
                                                        
                            @endcan
        @else
        @if($user->followering->contains($authuser->id))
                        
                            
                            <a href="/unfollow?profile={{$user->id}}" style="display:block;width:150px" class="pgrn-img">unfollow</a>
                        
                        @endif
                        @if(!($user->followering->contains($authuser->id))))
                        <a href="/follows?profile={{$user->id}}" style="display:block;width:150px" class="pgrn-img">follow</a>
                        
                        @endif
        @endif
                            
                            

                        </div>
    
    <div class="bookmark-ntfcns-con">
        <p></p>
        <h1 class="bookmark-ntfcns bookmark-display">already bookmarked</h1>
    </div>
    <div class="main-content">
    
                                
        <div class="main-content-nav" >
           <div class="main-content-nav-container">
                <div class="nav-header">
                        <div class="profile-pic">
                                    <img src="{{ asset('storage/tweetmedia/fjNWdivsubv0EWx1ONYe0RUiM5gf1KJIg74z2QI6.jpg') }}" alt="" srcset="" width="50px" height="50px" style="border-radius:100%">
                    
                        </div>
                        <div>
                            <h2>{{$user->name}}</h2>
                            <p>{{$user->email}}</p>
                        </div>
                        <div class="follow-stat">
                            <p>
                                <span class="figure">{{$following->count()}}</span>
                                <span>Following</span>
                            </p>
                            <p>
                                <span class="figure">{{$followers->count()}}</span>
                                <span>Followers</span>
                            </p>
                        </div>
                    </div>
                    <div class="nav-options">
                        <div class="nav-options-item" >
                            <a href="/profile/{{auth()->id()}}">Profile</a>
                        </div>
                        <div class="nav-options-item" >
                            <a href="/posts">Home</a>
                        </div>
                        <div class="nav-options-item" >Lists</div>
                        <div  class="nav-options-item">Topics</div>
                        <div  class="nav-options-item" id="bookmarknav">
                        <a href="/bookmarks">Bookmarks</a>
                        
                        </div>
                        <div  class="nav-options-item">Moments</div>
                        <div  class="nav-options-item"
                        ><form  action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                        <button type="submit">logout</button>
                                    </form></div>

                    </div>
                    <div class="nav-others">
                        <a href="">Settings and privacy</a>
                        <a href="">Help Center</a>
                    </div>

           </div>
            

        </div>
        <section class="tweet-container-wrapper">
            
            <div class=" tweet-container">
                
            @can('update-profile',$userid)
                
            @endcan
            
            @foreach($owner as $owners)
            <?php $postuserid = $owners->user->id ?>
            <!-- {{$postuserid = $owners->user->id}}
            {{$userid = $user->id}} -->
                <div class="each-tweet" id="postid-{{$owners->id}}-reply-btn-parent">
                    
                    
                    <div class="each-tweet-content">
                        <div class="profile-pic-wrapper">
                            @if($owners->file)
                                <div class="profile-pic">
                                    <img src="{{ asset('storage/'.$owners->file) }}" alt="" srcset="" width="50px" height="50px" style="border-radius:100%">
                    
                                </div>
                                @else 
                                <div class="profile-pic">
                                <img src="{{ asset('storage/'.$owners->file) }}" alt="" srcset="" width="50px" height="50px" style="border-radius:100%">
                    
                                </div> 
                                
                                
                        
                        @endif
                        </div>
                        
                        <div>
                            <div class="tweet-header each-tweet-itm">
                    
                         
                        
                    <!-- profile-pic -->
                    <div>
                        <h2> {{$owners->user->name}} </h2>
                        <p> {{$owners->user->email}} </p>
                    </div>
                    <!--  -->
                    @if(!($userid == $postuserid))
                    @if($owners->user->followering->contains($userid))
                    <div class="follow-btn" >
                        <button><a href="http://" style="display:block;width:150px">unfollow</a></button>
                    </div>
                    @endif
                    @if(!($owners->user->followering->contains($userid)))
                    <div class="follow-btn" >
                        <button><a href="http://" style="display:block;width:150px">follow</a></button>
                    </div>
                    @endif
                    

                        

                    @endif
                   
                        
                        

                    </div>
                    <div class="each-tweet-itm">
                        <h1>{{'POST ID '.$owners->id}}</h1>
                    </div>
                    <div class="each-tweet-itm">
                        <p>{{$owners->tweet}}</p>
                    </div>
                    
                        
                        
                        @if($owners->file)
                                <div class="tweet-media each-tweet-itm">
                                    <img src="{{ asset('storage/'.$owners->file) }}" alt="" srcset="" width="200px" height="200px">
                    
                                </div>
                                
                        
                        @endif
                        
                        <div class="tweet-footer each-tweet-itm">
                                <p> {{$owners->user->created_at}} </p>
                            
                        </div>
                        <div id="postid-{{$owners->id}}">
                        <div class="tweet-footer each-tweet-itm" >
                            <p id="postid-{{$owners->id}}-likes">Likes {{$owners->likes->count()}}</p> 
                            
                        </div>

                        </div>
                        
                        <div class="tweet-footer each-tweet-itm">
                            <div style="display:none"><input type='text' >
                            <button>send reply<button>

                            </div>
                        
                            
                        </div>
                        

                        <div class="tweet-footer each-tweet-itm">
                            <div class="tweet-footer-itm">
                            <button type="submit" class="reply-btn"  id="postid-{{$owners->id}}-reply-btn"><a href="/posts/{{$owners->id}}">Reply</a> </button>
                                <!-- <form action="/app" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$userid}}">
                                <input type="hidden" name="post_id" value="{{$owners->id}}">
                                <button type="submit" class="reply-btn"  id="postid-{{$owners->id}}-reply-btn">Reply</button>
    
                                </form> -->

                            </div>
                            <div class="tweet-footer-itm">
                                <form action="" method="post">
                                <button>Retweet</button>
                                </form>
                            </div>
                            <div class="tweet-footer-itm tweet-footer-itm-likebtn">
                                <form action="/like" method="post">
                                    @csrf
                                    <input type="hidden" name="Post_id" value={{$owners->id}}>
                                    <div >
                                        @if($owners->likes()->where('user_id', '=', $userid)->get()->count())
                                        <button type="submit" id="postid-{{$owners->id}}-likebtn" class="like" style="background-color:red;">Like</button>
                                        @else
                                        <button type="submit" id="postid-{{$owners->id}}-likebtn" class="like">Like</button>
                                        @endif
                                        
                                    </div>
                                    
                                </form>
                            </div>
                            <div class="tweet-footer-itm">
                                <form action="/bookmark" method="post" class="form-others">
                                    @csrf
                                    <input type="hidden" name="Post_id" value={{$owners->id}}>
                                    <div>
                                        
                                        <button type="submit" class="bookmark-sbt-btn">Bookmark</button>
                                    </div>
                                </form>
                            </div>
                            
                            
                        </div>
                        </div>
                    
                        
                    </div>
                            

                </div><!-- each tweet  -->
                
                        
            @endforeach
            
        </div><!-- tweet container -->
        </section>

        

    </div> <!-- main content -->
   
    <a href="/posts/create" class="tweet-link">
            <div class="tweet-btn">
                <p class="tweet-btn-txt">
                    tweet
                </p>

            </div>
        </a>
    
    <!-- <script src="{{ asset('js/myscript/like.js') }}" defer></script> -->
    <script src="{{ asset('js/myscript/bookmark.js') }}" defer></script>
    <script src="{{ asset('js/myscript/asynclike.js') }}" defer></script>
    <!-- <script src="{{ asset('js/myscript/reply.js') }}" defer></script> -->
</body>
</html>


