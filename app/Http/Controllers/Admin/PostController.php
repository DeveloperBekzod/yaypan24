<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Post;
use App\Models\Admin\Category;
use App\Models\Admin\Tag;
use Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
			$posts = Post::all();
			
			return view('admin.posts.index', compact('posts'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
				$categories = Category::all();
				$tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
			// dd($request->all());
        $request->validate([
					'title_uz' => 'required',
					'title_ru' => 'required',
					'category_id' => 'required',
					'text_uz' => 'required',
					'text_ru' => 'required',
				]);

				$requestData = $request->all();
				// $requestData['slug_uz'] = Str::slug($requestData['title_uz']);
				// $requestData['slug_ru'] = Str::slug($requestData['title_ru']);

				if($request->hasFile('image')) {
					$file = $request->file('image');
					$image_name = time().'.'.$file->getClientOriginalExtension();
					$file->move('img/posts/', $image_name);
					$requestData['image'] = $image_name;
				}

				$post = Post::create($requestData);
				$post->tags()->attach($request->tags);
				return redirect()->route('admin.posts.index')->with('message', 'Post created successfully !!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.detail', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
				$categories = Category::all();
				$tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
					'title_uz' => 'required',
					'title_ru' => 'required',
					'category_id' => 'required',
					'text_uz' => 'required',
					'text_ru' => 'required',
				]);

				$requestData = $request->all();
				if(!$request['is_special']) $requestData['is_special'] = false;
				// dd($requestData);
				// $requestData['slug_uz'] = Str::slug($requestData['title_uz']);
				// $requestData['slug_ru'] = Str::slug($requestData['title_ru']);

				if($request->hasFile('image')) {
					$file = $request->file('image');
					$image_name = time().'.'.$file->getClientOriginalExtension();
					$file->move('img/posts/', $image_name);
					$requestData['image'] = $image_name;
				}

				$post->update($requestData);
				$post->tags()->sync($request->tags);
				return redirect()->route('admin.posts.index')->with('message', 'Post updated successfully !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
				return redirect()->route('admin.posts.index')->with('message', 'Post deleted successfully !');
    }

		public function upload(Request $request) 
		{

			if($request->hasFile('upload')) {
				$originName = $request->file('upload')->getClientOriginalName();
				$fileName = pathinfo($originName, PATHINFO_FILENAME);
				$extension = $request->file('upload')->getClientOriginalExtension();
				$fileName = $fileName.'_'.time().'.'.$extension;
				$request->file('upload')->move(public_path('img/posts/'), $fileName);
				$CKEditorFuncNum = $request->input('CKEditorFuncNum');
				$url = asset('img/posts/'.$fileName); 
				$msg = 'Image successfully uploaded'; 
				$response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
					 
				@header('Content-type: text/html; charset=utf-8'); 
				echo $response;
			}
		}

}
