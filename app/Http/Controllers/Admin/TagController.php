<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Tag;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create post', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit post', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete post', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate(3);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_uz' => 'required|unique:tags',
            'name_ru' => 'required|unique:tags'
        ]);

        $requestData = $request->all();
        $requestData['slug_uz'] = Str::slug($request->name_uz);
        $requestData['slug_ru'] = Str::slug($request->name_ru);

        Tag::create($requestData);

        return redirect()->route('admin.tags.index')->with('message', 'Tag created succsessfully !!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.detail', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name_uz' => 'required',
            'name_ru' => 'required'
        ]);

        $requestData = $request->all();
        $requestData['slug_uz'] = Str::slug($request->name_uz);
        $requestData['slug_ru'] = Str::slug($request->name_ru);

        $tag->update($requestData);

        return redirect()->route('admin.tags.index')->with('message', 'Tag updated succsessfully !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('message', 'Tag deleted successfully !');
    }
}
