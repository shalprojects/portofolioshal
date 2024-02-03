<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class isikonten extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'gambar', 'harga', 'link', 'deskripsi'];
}
