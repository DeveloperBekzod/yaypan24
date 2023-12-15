<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Post;
use App\Models\Admin\Category;


class SiteController extends Controller
{
    public function index() {
			$specialpost = Post::where('is_special', true)->limit(6)->latest()->get();
			$posts = Post::where('is_special', false)->limit(6)->latest()->get();
			return view('index', compact('specialpost', 'posts'));
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
			$posts = $category->posts()->paginate(6);
			return view('categoryPosts', compact('posts', 'category'));
		}

		public function tags($tag_slug){
			$tag = Tag::where('slug_'.\App::getLocale(), $tag_slug)->first();
			$posts = $tag->posts;
			return view('categoryPosts', compact('posts', 'tag'));
		}

		public function search(Request $request) {
			$key = $request->key;
			$posts = Post::where('title_'.\App::getLocale(), 'like', '%'.$key.'%')
			->orWhere('text_'.\App::getLocale(), 'like', '%'.$key.'%')
			->get();
			// dd($key);
			return view('search', compact('key', 'posts'));
		}
}
