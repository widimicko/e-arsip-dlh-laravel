<?php

namespace App\Models;

use App\Models\Field;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Archive extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['category', 'field'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function field() {
        return $this->belongsTo(Field::class);
    }

    public static function getAllArchives() {
        return DB::table('archives')
            ->join('fields', 'fields.id', '=', 'archives.field_id')
            ->join('categories', 'categories.id', '=', 'archives.category_id')
            ->select('archives.*', 'categories.name as category', 'fields.name as field')
            ->get()->toArray();
    }

    public static function getArchivesByField($field) {
        return DB::table('archives')
            ->join('fields', 'fields.id', '=', 'archives.field_id')
            ->join('categories', 'categories.id', '=', 'archives.category_id')
            ->select('archives.*', 'categories.name as category', 'fields.name as field')
            ->where('fields.name', $field)
            ->get()->toArray();
    }
}
