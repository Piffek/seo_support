<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Posts;
use Session;
use Auth;
use File;

class PhotoController extends Controller
{



	
	public function delete_photo($title,$id)
	{
		$post = Posts::find($id);
		File::delete('photo_head/'.$title.'.jpg');
		return redirect()->back();
	}
	
	public function add_photo(Request $request)
	{

		
		$file = array('image' => Input::file('image'));
		
		$destinationPath = 'photo_head/';
		$extension = Input::file('image')->getClientOriginalExtension();
		$fileName = $request->title.'.'.$extension;
		
		Input::file('image')->move($destinationPath, $fileName);
		Session::flash('success','Dodano nowe zdjęcie');
		
		return redirect()->back();
	}
	



}
