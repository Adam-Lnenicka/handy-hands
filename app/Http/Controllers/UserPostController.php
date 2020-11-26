<?php

namespace App\Http\Controllers;

use App\Models\UserPost;
use App\Models\User;
use App\Models\Location;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;  

class UserPostController extends Controller
{
    
    public function index()
    {  
        // this is currently rendered in React
    
         return view('dashboard');
        //
    }

    public function helpmates(){
        $user = User::where('hopefuls_helpmates','helpmate')
            //   ->UserPost::where('user_id','id')
              ->get();
                
        return view('post.Helpmates-Post', compact('user'));
    }

    public function create()
    {
        return view('post.postForm');
    }

    
    public function store( Request $request)
    {
<<<<<<< HEAD
   // how to get the auth ID from the user
    // $user =User::findOrFail($user_id);


       $file = $request->file('uploadedm_file_path');
       $file->storeAs('public/images', $file->getClientOriginalName());
       $relative_url_to_uploaded_file = '/images/ ' . $file->getClientOriginalName();
            

            $post = New UserPost;
            $post->user_id= Auth::id();
            $post->uploadedm_photo_path = $relative_url_to_uploaded_file;
            $post->description =$request->input('description', 'default');
            $post->save();

            return redirect(action('UserPostController@index'));
=======
        
   // Below code store  new post into database  with uploaded file   
    $file = $request->file('uploadedm_file_path');
    $file->storeAs('public/images', $file->getClientOriginalName());
    $relative_url_to_uploaded_file = '/storage/images/' . $file->getClientOriginalName();
         

         $post = New UserPost;
         $post->user_id= Auth::id();
         $post->uploadedm_photo_path = $relative_url_to_uploaded_file;
         $post->description =$request->input('description');

         //$croppa = 'Croppa::url('   . $relative_url_to_uploaded_file  .  ')';
         $post->save();
      
         return redirect(action('UserPostController@create'));
>>>>>>> ec39dd5fa6189e4abf4d3df0a9028e4403aeafda
}
            
            

    public function show(UserPost $userPost)
    {
        //
    }

    public function edit(UserPost $userPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserPost  $userPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPost $userPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPost  $userPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPost $userPost)
    {
    
    }

    public function api(){
        
      //with location data and service category info 
      //Location below is the referenceing the exactly relationship  from the model 

<<<<<<< HEAD
        //with location data and service category info 

        $postdata = UserPost::orderBy('created_at' , 'desc')->with('Location')->get();
        return($postdata);

        
    }
    
    
}
=======
      $postdata = UserPost::orderBy('created_at' , 'desc')->with('Location')->with('User')->get();
  
      return($postdata);

}}

>>>>>>> ec39dd5fa6189e4abf4d3df0a9028e4403aeafda
