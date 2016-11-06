<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['email' => 'odranoelo_O@hotmail.com', 'password' => Hash::make( '12345678' ),'name' => 'leo' ]);
    }
}
