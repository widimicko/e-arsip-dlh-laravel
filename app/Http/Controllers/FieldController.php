<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Field;
use App\Models\Archive;
use App\Http\Requests\FieldRequest;

class FieldController extends Controller {

    public function index() {
        return view('fields.fields', ['fields' => Field::all()]);
    }

    public function store(FieldRequest $request) {
        Field::create($request->all());
        return redirect('/dashboard/fields')->with('success', "Bidang berhasil ditambahkan");
    }

    public function update(FieldRequest $request, Field $field) {
        Field::where('id', $field->id)->update(['name' => $request->name]);

        User::where('role', $field->name)->update([
            'role' => $request->name
        ]);

        return redirect('/dashboard/fields')->with('success', 'Bidang berhasil diubah');
    }

    public function destroy(Field $field) {
        $archives = Archive::where('category_id', $field->id)->get()->first();

        if ($archives) {
            return redirect('/dashboard/fields')->with('failed', 'Gagal, ada arsip yang memiliki bidang '. $field->name);
        }

        Field::destroy($field->id);
        return redirect('/dashboard/fields')->with('success', 'Bidang berhasil dihapus');
    }
}
