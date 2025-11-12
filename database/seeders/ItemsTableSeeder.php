<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\User;

class ItemsTableSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        Item::create([
            'code'=>'BRG001',
            'name'=>'Contoh Barang 1',
            'description'=>'Deskripsi contoh barang 1',
            'quantity'=>10,
            'price'=>100000,
            'created_by'=>$user->id,
        ]);

        Item::create([
            'code'=>'BRG002',
            'name'=>'Contoh Barang 2',
            'description'=>'Deskripsi contoh barang 2',
            'quantity'=>5,
            'price'=>200000,
            'created_by'=>$user->id,
        ]);
    }
}
