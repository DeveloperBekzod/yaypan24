<?php

namespace App\Http\Controllers;

use App\DataObjects\CategoryData;
use App\DataObjects\CategoryPostsData;
use App\DataObjects\PostData;
use App\DataObjects\PostDetailData;
use App\DataObjects\TagData;
use App\Services\PostService;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\Admin\Post;
use App\Models\Admin\Category;
use App\Models\Admin\Tag;
use App\Models\Message as Messagemodel;
use Illuminate\Support\Facades\Cache;
use \Illuminate\Support\Facades\Mail;
use App\Mail\Message;
use App\Rules\GoogleRecaptcha;
use Butschster\Head\Facades\Meta;
use Illuminate\Support\Facades\Redis;


class SiteController extends Controller
{
    public function index()
    {
        $postsData = Post::where('is_special', false)->limit(6)->latest()->get();
        $posts  = $postsData->transform(function ($post) {
            return PostData::createFromEloquentModel($post);
        });
        Meta::prependTitle('Home page');
        Meta::setDescription('Awesome page');
        Meta::setKeywords(['Awesome keyword', 'keyword2']);
        return view('index', compact('posts'));
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
        $postData = Post::query()->where('slug_uz', $slug)->orWhere('slug_ru', $slug)->with('tags')->first();
        $postData->increment('view');
        $postData->save();
        $postData->tags->transform(function ($tag) {
            return TagData::createFromEloquentModel($tag);
        });
        $post = PostDetailData::createFromEloquentModel($postData);
        Meta::prependTitle($post->metaTitle());
        Meta::setDescription($post->metaDescription());
        Meta::setKeywords($post->metaKeywords());
        $relatedPostsData = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->with('tags')
            ->limit(3)
            ->latest()
            ->get();
        $relatedPosts = $relatedPostsData->transform(function ($post) {
            $post->tags->transform(function ($tag) {
                return TagData::createFromEloquentModel($tag);
            });
            return PostDetailData::createFromEloquentModel($post);
        });

        return view('postDetail', compact('post', 'relatedPosts'));
    }

    public function categoryPosts($category_slug)
    {
        $categoryData = Category::query()->where('slug_uz', $category_slug)->orWhere('slug_ru', $category_slug)->first();
        $postsData = $categoryData->posts()->get();
        $posts = $postsData->transform(function ($post) {
            return PostData::createFromEloquentModel($post);
        });
        $categoryData->posts->transform(function ($item) {
            return PostData::createFromEloquentModel($item);
        });
        $category = CategoryData::createFromEloquentModel($categoryData);
        Meta::prependTitle($category->metaTitle());
        Meta::setDescription($category->metaDescription());
        Meta::setKeywords($category->metaKeywords());
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
        return back();
    }
}
