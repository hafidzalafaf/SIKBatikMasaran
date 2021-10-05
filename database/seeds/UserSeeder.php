<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@batik.id',
            'password' => bcrypt('12345678'),
            'no_telp' => '085743453',
            'nama_toko' => '-',
        ]);

        $admin->assignRole('Admin');

        $pemilik= User::create([
            'name' => 'Pemilik1',
            'email' => 'pemilik@batik.id',
            'password' => bcrypt('12345678'),
            'no_telp' => '085743453',
            'nama_toko' => 'Toko Batik AV',
        ]);

        $pemilik->assignRole('Pemilik');
    }
}
