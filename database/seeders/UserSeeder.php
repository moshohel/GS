<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $careTakerUserObj = new User();
        $careTakerUserObj->name = 'Care Taker 1';
        $careTakerUserObj->email = 'caretaker1@gmail.com';
        $careTakerUserObj->password = Hash::make('123456789');
        $careTakerUserObj->user_type = 'CARETAKER';
        $careTakerUserObj->save();

        $managerUserObj = new User();
        $managerUserObj->name = 'manager 1';
        $managerUserObj->email = 'manager@gmail.com';
        $managerUserObj->password = Hash::make('123456789');
        $managerUserObj->user_type = 'MAGAGER';
        $managerUserObj->save();

        $superAdminObj = new User();
        $superAdminObj->name = 'Super Admin';
        $superAdminObj->email = 'admin@gmail.com';
        $superAdminObj->password = Hash::make('123456789');
        $superAdminObj->user_type = 'ADMIN';
        $superAdminObj->save();
    }
}
