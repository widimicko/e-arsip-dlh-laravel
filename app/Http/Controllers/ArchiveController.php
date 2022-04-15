<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Archive;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArchiveController extends Controller {
    public function field(Field $field) {
        return view('archive.archives', [
            'archives' => Archive::with('field', 'category')->whereBelongsTo($field)->get(),
            'fields' => Field::all()
        ]);
    }

    public function create() {
        return view('archive.create', [
            'archives' => Archive::all(),
            'categories' => Category::all(),
            'fields' => Field::all()
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|min:7|max:255',
            'document' => 'required',
            'category_id' => 'required',
            'field_id' => 'required',
        ]);

        if (Auth::user()->role !== 'admin') {
            $validatedData['field_id'] = Field::where('name', Auth::user()->role)->first()->id;
        }

        $validatedData['document'] = $request->file('document')->store('archives');

        Archive::create($validatedData);
        return redirect('/')->with('success', "Arsip berhasil ditambahkan");
    }

    public function show(Archive $archive) {
        return view('archive.detail', [
            'archive' => $archive,
            'fields' => Field::all()
        ]);
    }

    public function edit(Archive $archive) {
        return view('archive.edit', [
            'archive' => $archive,
            'categories' => Category::all(),
            'fields' => Field::all()
        ]);
    }

    public function update(Request $request, Archive $archive) {
        $validatedData = $request->validate([
            'title' => 'required|min:7|max:255',
            'category_id' => 'required',
            'field_id' => 'required',
        ]);

        if (Auth::user()->role !== 'admin') {
            $validatedData['field_id'] = Field::where('name', Auth::user()->role)->first()->id;
        }

        if($request->file('document')) {
            Storage::delete($archive->document);
            $validatedData['document'] = $request->file('document')->store('archives');
        }

        Archive::where('id', $archive->id)->update($validatedData);
        return redirect('/')->with('success', 'Dokumen berhasil diubah');
    }

    public function destroy(Archive $archive) {
        if ($archive->document) {
            Storage::delete($archive->document);
        }

        Archive::destroy($archive->id);

        return redirect('/')->with('success', 'Arsip berhasil dihapus');
    }

    public function download(Archive $archive) {
        if ($archive->document) {
            return Storage::download($archive->document);
        } else {
            return response()->json(['message'=> 'Dokumen arsip tidak ditemukan']);
        }
    }
}
