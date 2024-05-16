<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\Admin\Post;
use App\Models\Admin\Category;
use App\Models\Admin\Tag;
use App\Models\Message as Messagemodel;
use \Illuminate\Support\Facades\Mail;
use App\Mail\Message;
use App\Rules\GoogleRecaptcha;
use Butschster\Head\Facades\Meta;


class SiteController extends Controller
{
    public function index()
    {
        $specialpost = Post::where('is_special', true)->limit(6)->latest()->get();
        $posts = Post::where('is_special', false)->limit(6)->latest()->get();
        Meta::prependTitle('Home page');
        Meta::setDescription('Awesome page');
        Meta::setKeywords(['Awesome keyword', 'keyword2']);
        return view('index', compact('specialpost', 'posts'));
    }

    public function contact()
    {
        Meta::prependTitle('Contact page');
        Meta::setDescription('Awesome page');
        Meta::setKeywords(['Awesome keyword', 'keyword2']);
        return view('contact');
    }

    public function postDetail($slug)
    {
        $post = Post::where('slug_' . App::getLocale(), $slug)->first();;
        Meta::prependTitle($post['meta_title_' . App::getLocale()]);
        Meta::setDescription($post['meta_description_' . App::getLocale()]);
        Meta::setKeywords($post['meta_keywords_' . App::getLocale()]);
        $post->increment('view');
        $post->save();
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->limit(3)
            ->latest()
            ->get();
        return view('postDetail', compact('post', 'relatedPosts'));
    }

    public function categoryPosts($category_slug)
    {
        $category = Category::where('slug_' . App::getLocale(), $category_slug)->first();
        Meta::prependTitle($category['meta_title_' . App::getLocale()]);
        Meta::setDescription($category['meta_description_' . App::getLocale()]);
        Meta::setKeywords($category['meta_keywords_' . App::getLocale()]);
        $posts = $category->posts()->paginate(6);
        return view('categoryPosts', compact('posts', 'category'));
    }

    public function tagsPost($tag_slug)
    {
        $tag = Tag::where('slug_' . App::getLocale(), $tag_slug)->first();
        Meta::prependTitle($tag['meta_title_' . App::getLocale()]);
        Meta::setDescription($tag['meta_description_' . App::getLocale()]);
        Meta::setKeywords($tag['meta_keywords_' . App::getLocale()]);
        $posts = $tag->posts()->paginate(6);

        return view('tagPosts', compact('posts', 'tag'));
    }

    public function search(Request $request)
    {
        $key = $request->key;
        $posts = Post::where('title_' . App::getLocale(), 'like', '%' . $key . '%')
            ->orWhere('text_' . App::getLocale(), 'like', '%' . $key . '%')
            ->get();
        Meta::prependTitle('Search page');
        return view('search', compact('key', 'posts'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => ['required', new GoogleRecaptcha]
        ], ['g-recaptcha-response.required' => 'The recaptcha field is required.']);
        $requestData = $request->all();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('files/', $file_name);
            $requestData['file'] = 'files/' . $file_name;
        }
        $message = Messagemodel::create($requestData);
        Mail::to('raximovbekzodbek95@gmail.com')->send(new Message($requestData));
        return back()->with('message', 'Murojaat yuborildi.');
    }

    public function language($lang)
    {
        session(['lang' => $lang]);
        // dd(session(['lang']));
        return back();
    }
}
