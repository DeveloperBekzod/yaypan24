<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Post;
use App\Models\Admin\Category;


class SiteController extends Controller
{
    public function index() {
			$specialpost = Post::where('is_special', true)->limit(6)->latest()->get();
			$latestpost = Post::where('is_special', false)->limit(6)->latest()->get();
			return view('index', compact('specialpost', 'latestpost'));
		}

		public function contact(){
			return view('contact');
		}

		public function postDetail($slug){
			$post = Post::where('slug_'.\App::getLocale(), $slug)->first();;
			$post->increment('view');
			$post->save();
			$relatedPosts = Post::where('category_id', $post->category_id)
			->where('id', '!=', $post->id)
			->limit(3)
			->latest()
			->get();
			return view('postDetail', compact('post', 'relatedPosts'));
		}
		
		public function categoryPosts($category_slug){
			$category = Category::where('slug_'.\App::getLocale(), $category_slug)->first();
			$latestpost = $category->posts;
			return view('categoryPosts', compact('latestpost', 'category'));
		}

		public function tags($tag_slug){
			$tag = Tag::where('slug_'.\App::getLocale(), $tag_slug)->first();
			$latestpost = $tag->posts;
			return view('categoryPosts', compact('latestpost', 'tag'));
		}
}
