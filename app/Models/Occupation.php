<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    //
    use HasFactory;

    protected $fillable = ['name', 'industry'];


    // public function belo

    // public function profile()
    public function scopeSearch($query, $text)
    {
        return $query->where('name', 'like', "%$text%")
                     ->orWhere('industry', 'like', "%$text%");
    }
}
