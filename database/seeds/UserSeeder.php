<?php

use App\User;
use App\Model\Officials;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $officials  = Officials::where('position','Chairman')->get();
        foreach ($officials as $key => $official) {
            User::create( [
                'email' => Str::lower(str_replace(' ', '', $official->name)).'@app.com',
                'name' => $official->name,
                'password' => Hash::make('password'),
                'official_id' => $official->id,
            ]);
        }
        User::create( [
            'email' => 'admin@app.com',
            'name' => 'Administrator',
            'password' => Hash::make('password'),
            'role' => 'Admin',
        ]);
    }
}
