<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Posts;
use Session;
use Auth;
use File;

class PostController extends Controller
{
	

	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::orderBy('id','desc')->paginate(5);
        return view('posts.index')->withPosts($posts);
    }

    
    public function show($id)
    {
    	$post = Posts::find($id);
		 
		
			$all_my_posts = Posts::limit(3)->orderBy('created_at', 'desc')->get();
			$post_nr_layout = Posts::where('id',$id)->get();
			foreach($post_nr_layout as $posts_layout)
			{
				$layout = $posts_layout->layout_nr;
			
				$slug_array = array();
				if($post->slug)
				{
					$slug_array = explode(',',$post->slug);
				}
				if($layout === 1)
				{
			
					return View('layouts.change_layout.layout1')->withPost($post)->withall_my_posts($all_my_posts)->withSlug_array($slug_array);
			
				}else if($layout === 2)
				{
					
					return View('layouts.change_layout.layout2')->withPost($post)->withSlug_array($slug_array);
			
				}else if($layout === 3)
				{
					return View('layouts.change_layout.layout3')->withPost($post)->withall_my_posts($all_my_posts)->withSlug_array($slug_array);
				}
			}
		
    	//return view('posts.show')->withPost($post);
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
        	'title' => 'required|max:255','unique',
        	'body' => 'required',
        	'slug' => 'max:255',
        	'image' => 'required',
        ));
        
        $file = array('image' => Input::file('image'));
        
        $destinationPath = 'photo_head/';
        $extension = Input::file('image')->getClientOriginalExtension();
        $fileName = $request->title.'.'.$extension;
        
        Input::file('image')->move($destinationPath, $fileName);
       
        $post = new Posts;
        
		$slug_array = array();
			$aArr1 = array('ą', 'ę', 'ć','ó', 'ś','ń', 'ż', ' ');
			$aArr2 = array('a', 'e', 'c','o', 's','n', 'z', '-');
			//$slug_array = explode(',',$post->slug);
			$slug_array = str_replace($aArr1, $aArr2, $request->slug);
		
		
		
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $slug_array;
        $post->layout_nr = $request->nr_layout;
        $post->user_id = Auth::user()->id;
        $post -> save();
        
        Session::flash('success','Dodano post');
        return view('posts.edit')->withPost($post);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function myPosts()
    {
    	$posts = Posts::whereuser_id(Auth::user()->id)->paginate(5);
    	return view('posts.myposts')->withPosts($posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function delete_photo($title,$id)
    {
    	$post = Posts::find($id);
    	File::delete('photo_head/'.$title.'.jpg');
    	return view('posts.edit')->withPost($post);
    }
    
    public function edit($id)
    {
        $post = Posts::find($id);
        return view('posts.edit')->withPost($post);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$post = Posts::find($id);
    	if($request->input('slug') == $post->slug)
    	{
    		$this->validate($request, array(
    				'title' => 'required|max:255',
    				'body' => 'required'
    				
    		));
    		
    	}else 
    	{
	    	$this->validate($request, array(
	    			'title' => 'required|max:255',
	    			'body' => 'required',
	    			'slug' => 'required|max:255|min:5|unique:posts,slug',
	    	));
    	}
    	$post = Posts::find($id);
    	
    	$post->title =$request->input('title');
    	$post->body = $request->input('body');
    	$post->slug = $request->input('slug');
    	$post->layout_nr = $request->nr_layout;
    	$post -> save();
    	Session::flash('success',' Edycja danych przebiegła pomyslnie');
    	
    	return redirect()->back();
    	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       	$post=Posts::find($id);
       	File::delete('photo_head/'.$post->title.'.jpg');
		//File::cleanDirectory('photos/shares/');
       	$post->delete();
       	
       	Session::flash('success','Usunięto post');
       	//return view('posts.myposts');
       	return redirect()->action('PostController@myPosts');
    }
}
