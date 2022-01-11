<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder{

    public function run(){
        $user = User::where('email', 'andylammerts@outlook.com')->first();

        if(!$user) {
          User::create([
            'username'=>'Babsar',
            'email'=>'andylammerts@outlook.com',
            'first_name'=>'Andy',
            'last_name'=>'Lammerts',
            'password'=>Hash::make('Bankstel12345'),
            'role'=>'admin'
          ]);
        }
    }
}
