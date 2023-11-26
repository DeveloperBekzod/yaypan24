<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index() {
			return view('index');
		}

		public function contact(){
			return view('contact');
		}

		public function postDetail(){
			return view('postDetail');
		}
		
		public function categoryPosts(){
			return view('postDetail');
		}
}
