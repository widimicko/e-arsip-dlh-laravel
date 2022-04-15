<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        if(Auth::check()) {
            if (Auth::user()->role == 'admin') {
                return view('archive.archives', [
                    'archives' => Archive::with('field', 'category')->get(),
                    'fields' => Field::all()
                ]);
            } else {
                $field = Field::where('name', Auth::user()->role)->get()->first();
                return view('archive.archives', [
                    'archives' => Archive::with('field', 'category')->whereBelongsTo($field)->get()
                ]);
            }
        } else {
            return redirect('login');
        }
    }
}
