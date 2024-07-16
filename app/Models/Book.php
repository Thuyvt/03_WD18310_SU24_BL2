<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'name',
        'public_company',
        'image',
        'quantity',
        'is_active',
    ];

    public $casts = [
      'is_active' => 'boolean'
    ];

    public function author() {
        return $this->belongsTo(Author::class);
    }

}
