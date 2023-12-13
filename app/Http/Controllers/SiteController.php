<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Post;


class SiteController extends Controller
{
    public function index() {
			$posts = Post::all();
			$specialpost = Post::where('is_special', true)->limit(6)->latest()->get();
			$latestpost = Post::limit(6)->latest()->get();
			return view('index', compact('posts', 'specialpost', 'latestpost'));
		}

		public function contact(){
			return view('contact');
		}

		public function postDetail(Post $post){
			return view('postDetail', compact('post'));
		}
		
		public function categoryPosts(){
			return view('categoryPosts');
		}
}
