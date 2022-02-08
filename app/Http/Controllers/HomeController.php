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
                    'archives' => Archive::getAllArchives(),
                    'fields' => Field::all()
                ]);
            } else {  
                return view('archive.archives', [
                    'archives' => Archive::getArchivesByField(Auth::user()->role)
                ]);
            }
        } else {
            return redirect('login');
        }
    }
}
