<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'copies',
        'is_available',
        'isbn',
    ];

    protected function casts(): array
    {
        return [
            'copies' => 'integer',
            'is_available' => 'boolean',
        ];
    }
}