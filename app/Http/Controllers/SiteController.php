<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Post;

class SiteController extends Controller
{
    public function index() {
			$posts = Post::all();
			return view('index', compact('posts'));
		}

		public function contact(){
			return view('contact');
		}

		public function postDetail(Post $post){
			return view('postDetail', compact('post'));
		}
		
		public function categoryPosts(){
			return view('postDetail');
		}
}
