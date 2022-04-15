<?php

namespace App\Models;

use App\Models\Archive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Field extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function archive() {
        return $this->hasMany(Archive::class);
    }
}
