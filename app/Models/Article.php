<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'abstrak',
        'kategori',
        'penulis',
        'file_path',
        'tanggal_publikasi'
    ];
}
