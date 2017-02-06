<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Posts;

class BaseController {
	public function getTag($slug)
	{
		$post = Posts::where('slug', '=', $slug)->first();
		return View('pages.tags')->with('post', $post);
	}
}