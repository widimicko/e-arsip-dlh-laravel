<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Archive;
use App\Models\Category;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource by field name.
     *
     * @return \Illuminate\Http\Response
     */
    public function field(Field $field) {
        return view('archive.archives', [
            'archives' => Archive::getArchivesByField($field->name),
            'fields' => Field::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('archive.create', [
            'archives' => Archive::all(),
            'categories' => Category::all(),
            'fields' => Field::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function show(Archive $archive)
    {
        return view('archive.detail', [
            'archive' => $archive,
            'fields' => Field::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function edit(Archive $archive)
    {
        return view('archive.edit', [
            'archive' => $archive,
            'categories' => Category::all(),
            'fields' => Field::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archive $archive)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:7|max:255',
            'category_id' => 'required',
            'field_id' => 'required',
        ]);

        if (Auth::user()->role !== 'admin') {
            $validatedData['field_id'] = Field::where('name', Auth::user()->role)->first()->id;
        }

        if($request->file('document')) {
            Storage::delete($archive->image);
            $validatedData['document'] = $request->file('document')->store('archives');
        }

        Archive::where('id', $archive->id)->update($validatedData);

        return redirect('/')->with('success', 'Dokumen berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archive $archive)
    {
        if ($archive->document) {
            Storage::delete($archive->document);
        }

        Archive::destroy($archive->id);

        return redirect('/')->with('success', 'Arsip berhasil dihapus');
    }

    public function download(Archive $archive)
    {
        if ($archive->document) {
            return Storage::download($archive->document);
        } else {
            return response()->json(['message'=> 'Dokumen arsip tidak ditemukan']);
        }
    }
}
