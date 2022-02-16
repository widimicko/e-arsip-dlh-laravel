<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Archive;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller {
    public function index() {
        return view('categories.categories', [
            'categories' => Category::all(),
            'fields' => Field::all(),
        ]);
    }

    public function store(CategoryRequest $request) {
        Category::create($request->all());
        return redirect('/dashboard/categories')->with('success', "Kategori berhasil ditambahkan");
    }

    public function update(CategoryRequest $request, Category $category) {
        Category::where('id', $category->id)->update(['name' => $request->name]);
        return redirect('/dashboard/categories')->with('success', 'Kategori berhasil diubah');
    }

    public function destroy(Category $category) {
        $archives = Archive::where('category_id', $category->id)->get()->first();

        if ($archives) {
            return redirect('/dashboard/categories')->with('failed', 'Gagal, ada arsip yang memiliki kategori '. $category->name);
        }

        Category::destroy($category->id);
        return redirect('/dashboard/categories')->with('success', 'Kategori berhasil dihapus');
    }
}
