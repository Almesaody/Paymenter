<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'slug' => 'required',
        ]);

        Categories::create($data);

        return redirect()->route('admin.categories');
    }

    public function edit(Categories $categories)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Categories $categories)
    {
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'slug' => 'required',
        ]);

        $category->update($data);

        return redirect()->route('admin.categories');
    }

    public function destroy(Categories $categories)
    {
        $category->delete();

        return redirect()->route('admin.categories');
    }
}