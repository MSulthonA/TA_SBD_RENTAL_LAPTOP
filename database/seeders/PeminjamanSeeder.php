<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peminjaman')->insert([
            'harga_peminjaman' => 523454,
            'denda' => 198876,
            'status_peminjaman' => 'sedang masa peminjaman',
            'status_pembayaran' => 'belum dibayar',
            'lama_peminjaman' => 8,
            'tanggal_pengembalian' => '2018-02-02',
            'tanggal_peminjaman' => '2018-02-12',
        ]);
        DB::table('peminjaman')->insert([
            'harga_peminjaman' => 20000,
            'denda' => 5000,
            'status_peminjaman' => 'sedang masa peminjaman',
            'status_pembayaran' => 'belum dibayar',
            'lama_peminjaman' => 9,
            'tanggal_pengembalian' => '2018-04-12',
            'tanggal_peminjaman' => '2018-03-12',
        ]);
    }
}
