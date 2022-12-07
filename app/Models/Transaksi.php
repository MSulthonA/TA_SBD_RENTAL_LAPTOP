<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $table = 'transaksi';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id_admin',
        'id_peminjam',
        'id_laptop',
        'id_peminjaman',
    ];
    public function admin(){
        return $this->belongsTo('App\Models\Admin','id_admin','id_admin');
    }
    public function laptop(){
        return $this->belongsTo('App\Models\Laptop','id_laptop','id_laptop');
    }
    public function peminjam(){
        return $this->belongsTo('App\Models\Peminjam','id_peminjam','id_peminjam');
    }
    public function peminjaman(){
        return $this->belongsTo('App\Models\Peminjaman','id_peminjaman','id_peminjaman');
    }
}
