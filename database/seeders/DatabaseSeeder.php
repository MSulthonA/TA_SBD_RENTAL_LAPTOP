<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $nama_laptop = ['asus'=>['asus chromebook','asus vivobook','asus zenbook','asus proart','asus tufgaming'],'dell'=>['dell vostro 3400','dell inspiron 5405','dell xps 13'],'acer'=>['acer aspire slim','acer aspire vero','acer swift'],'lenovo'=>['lenovo yoga slim','lenovo carbon','lenovo legion'],'hp'=>['hp pavilion','hp probook','hp spectre']];
        $tipe_laptop = ['core i1','core i3','core i5','core i7','core i9','quad core'];
        $merek_laptop = ['asus','dell','acer','lenovo','hp'];
        $faker = Faker::create();
        foreach (range(1,100) as $index) { 
            $merek = Arr::random($merek_laptop);
            $namas = $nama_laptop[$merek];
            $nama = Arr::random($namas);
            $tipe = Arr::random($tipe_laptop);
            $harga = $faker->numberBetween(10,100);
            $tanggal = $faker->dateTimeInInterval('-1 week');
            DB::table('laptop')->insert([
                'nama_laptop' => $nama,
                'tipe_laptop' => $tipe,
                'merek_laptop' => $merek,
                'harga_laptop' => $harga."00000",
                'created_at' => $tanggal,
                'updated_at' => $tanggal
            ]);
        }
        $jenis_kelamin = ['laki-laki','perempuan'];
        foreach (range(1,10) as $index) { 
            $tanggal = $faker->dateTimeInInterval('-1 week');
            DB::table('admin')->insert([
                'username_admin' => "username".$index,
                'password_admin' => "password",
                'nama_admin' => $faker->name(),
                'jenis_kelamin_admin' => Arr::random($jenis_kelamin),
                'created_at' => $tanggal,
                'updated_at' => $tanggal
            ]);
        }
        foreach (range(1,10) as $index) { 
            $tanggal = $faker->dateTimeInInterval('-1 week');
            DB::table('peminjam')->insert([
                'username_peminjam' => "usernamePeminjam".$index,
                'password' => "password",
                'nomor_hp'=>"62".$faker->randomNumber(8),
                'alamat_peminjam'=>$faker->address(),
                'nama_peminjam' => $faker->name(),
                'jenis_kelamin_peminjam' => Arr::random($jenis_kelamin),
                'created_at' => $tanggal,
                'updated_at' => $tanggal
            ]);
        }
        foreach (range(1,10) as $index) { 
            $harga = $faker->numberBetween(10,100);
            $denda = $faker->numberBetween(1,10);
            $tanggal = $faker->dateTimeInInterval('-1 week');
            $status_peminjaman = ['sedang masa peminjaman','selesai masa peminjaman'];
            $status_pembayaran = ['belum dibayar','sudah dibayar'];
            $lama = $faker->numberBetween(1,15);
            $tanggal_pengembalian = $faker->dateTimeBetween('-3 days', '-1 days');
            $tanggal_peminjaman = $faker->dateTimeBetween('-1 week','-3 days');
            DB::table('peminjaman')->insert([
                'harga_peminjaman' => $harga."000",
                'denda'=> $denda.'00',
                'status_peminjaman'=>Arr::random($status_peminjaman),
                'status_pembayaran'=>Arr::random($status_pembayaran),
                'lama_peminjaman'=>$lama,
                'tanggal_pengembalian'=>$tanggal_pengembalian,
                'tanggal_peminjaman'=>$tanggal_peminjaman,
                'created_at' => $tanggal,
                'updated_at' => $tanggal
            ]);
        }
        foreach (range(1,10) as $index) { 
            $tanggal = $faker->dateTimeInInterval('-1 week');
            DB::table('transaksi')->insert([
                'id_admin'=>$faker->numberBetween(1,10),
                'id_peminjam'=>$faker->numberBetween(1,10),
                'id_laptop'=>$faker->numberBetween(1,100),
                'id_peminjaman'=>$faker->numberBetween(1,10),
                'created_at'=>$tanggal,
                'updated_at'=>$tanggal

            ]);
        }
        // DB::table('peminjaman')->insert([
        //     'harga_peminjaman' => 523454,
        //     'denda' => 198876,
        //     'status_peminjaman' => 'sedang masa peminjaman',
        //     'status_pembayaran' => 'belum dibayar',
        //     'lama_peminjaman' => 8,
        //     'tanggal_pengembalian' => '2018-02-02',
        //     'tanggal_peminjaman' => '2018-02-12',
        // ]);
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
