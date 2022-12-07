<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admin';
    public function transaksi(){
        return $this->hasMany('App\Models\Transaksi','id_admin');
    }
}
