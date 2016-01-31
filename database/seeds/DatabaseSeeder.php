<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'tomo',
            'email' => 'tomo@pagu.co',
            'password' => bcrypt('secret'),
            'idols' => '1,2'
        ]);
        
        DB::table('idols')->insert([
            'name' => 'Furukawa Mirin',
            'group' => 'Dempagumi.inc',
            'imageurl' => 'https://pbs.twimg.com/profile_images/522380098708586496/V52JG72C.jpeg'
        ]);
        
        DB::table('idols')->insert([
            'name' => 'Nanase Gumi',
            'group' => 'Banmon',
            'imageurl' => 'https://pbs.twimg.com/profile_images/684657802640404480/PH6Fc0Ty.jpg'
        ]);
        
        DB::table('idols')->insert([
            'name' => 'Takashima Kaede',
            'group' => 'PassCode',
            'imageurl' => 'https://pbs.twimg.com/profile_images/667285652157759488/tVts1XrP.jpg'
        ]);
    }
}
