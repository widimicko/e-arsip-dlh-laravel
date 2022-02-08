<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Archive;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function archive() {
        return $this->hasMany(Archive::class);
    }
}
