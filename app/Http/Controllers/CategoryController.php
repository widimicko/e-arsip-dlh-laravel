<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Category;
use App\Models\Field;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function index() {
        return view('categories.categories', [
            'categories' => Category::all(),
            'fields' => Field::all(),
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|min:5|max:255'
        ]);

        Category::create($validatedData);
        return redirect('/dashboard/categories')->with('success', "Kategori berhasil ditambahkan");
    }

    public function update(Request $request, Category $category) {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|min:5|max:255',
        ]);

        Category::where('id', $category->id)->update($validatedData);
        return redirect('/dashboard/categories')->with('success', 'Kategori berhasil diubah');
    }

    public function destroy(Category $category) {
        $archives = Archive::where('category_id', $category->id)->get();

        if ($archives) {
            return redirect('/dashboard/categories')->with('failed', 'Gagal, ada arsip yang memiliki kategori '. $category->name);
        }

        Category::destroy($category->id);
        return redirect('/dashboard/categories')->with('success', 'Kategori berhasil dihapus');
    }
}
