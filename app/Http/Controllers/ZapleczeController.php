<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blogs;

class ZapleczeController extends Controller
{
	
   public function index()
   {
   		//$zaplecze = Blogs::all();
   		return view('wpisy.index');
   }
}
