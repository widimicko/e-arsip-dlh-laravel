<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Archive;
use App\Models\User;
use Illuminate\Http\Request;

class FieldController extends Controller
{

    public function index()
    {
        return view('fields.fields', ['fields' => Field::all()]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:fields|min:5|max:255'
        ]);

        Field::create($validatedData);
        return redirect('/dashboard/fields')->with('success', "Bidang berhasil ditambahkan");
    }

    public function update(Request $request, Field $field)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:fields|min:5|max:255',
        ]);

        Field::where('id', $field->id)->update($validatedData);

        User::where('role', $field->name)->update([
            'role' => $validatedData['name']
        ]);

        return redirect('/dashboard/fields')->with('success', 'Bidang berhasil diubah');
    }

    public function destroy(Field $field)
    {
        $archives = Archive::where('category_id', $field->id)->get();

        if ($archives) {
            return redirect('/dashboard/fields')->with('failed', 'Gagal, ada arsip yang memiliki bidang '. $field->name);
        }

        Category::destroy($field->id);
        return redirect('/dashboard/fields')->with('success', 'Bidang berhasil dihapus');
    }
}
