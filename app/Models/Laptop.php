<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;
    protected $table = 'laptop';
    protected $fillable = [
        'nama_laptop',
        'tipe_laptop',
        'merek_laptop',
        'harga_laptop',
    ];
}
