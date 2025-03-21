<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorShopProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email','vendor@gmail.com')->first();

        $vendor = new Vendor();
        $vendor->banner = 'uploads/photo__67740f5003ee4.jpg';
        $vendor->shop_name = 'Vendor Shop';
        $vendor->phone = '12344';
        $vendor->email = 'vendor@gmail.com';
        $vendor->address = 'TW';
        $vendor->description = 'good';
        $vendor->user_id = $user->id;
        $vendor->save();
    }
}
