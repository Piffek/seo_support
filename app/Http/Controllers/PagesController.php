<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\User;
use Session;
use Auth;

class PagesController extends Controller
{
	public function getIndex()
	{
		$post = Posts::orderBy('id','desc')->paginate(5);
		return View('pages.wpisy')->with('post', $post);
	}
	
	
	public function getLogin()
	{
		return view('auth.login');
	}
	
	public function getRegister()
	{
		return view('auth.register');
	}
	
	
	public function getAbout()
	{
		return view('pages.onas');
	}
	
	public function getContact()
	{
		return view('pages.kontakt');
	}
	
	public function changeLayout()
	{
		return view('partials.check_layout');
	}
	
	public function changeNrLayout(Request $request)
	{
		$user = User::find(Auth::user()->id);
		$user->nr_layout =$request->input('nr_layout');
		$user->save();
		Session::flash('success',' Zmieniono layout postów');
		return redirect()->back();
	}
	
    //
}
