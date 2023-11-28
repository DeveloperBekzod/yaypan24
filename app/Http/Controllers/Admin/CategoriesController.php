<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index', ['categories'=>Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {		
				$this->validate($request, [
					'name_uz'=>'required|unique:categories',
					'name_ru'=>'required|unique:categories'
				]);
        $categoriesData = $request->all();
				$categoriesData['slug_uz']=\Str::slug($categoriesData['name_uz']);
				$categoriesData['slug_ru']=\Str::slug($categoriesData['name_ru']);

				Category::create($categoriesData);
				// dd($categoriesData);
				return redirect()->route('admin.categories.index')->with('message', 'Category created successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
