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
            'idols' => ',1,2,3,5,6',
            'color' => 'red'
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
        DB::table('idols')->insert([
            'name' => 'Risa Aizawa',
            'group' => 'Dempagumi.inc',
            'imageurl' => 'https://pbs.twimg.com/profile_images/640534276115566592/Al_L8Bp4.jpg'
        ]);
        DB::table('idols')->insert([
            'name' => 'Iori Amamiya',
            'group' => 'Moso Calibration',
            'imageurl' => 'https://pbs.twimg.com/media/CaM7tzkVAAEsAxE.jpg:large'
        ]);
        DB::table('idols')->insert([
            'name' => 'Ano',
            'group' => 'YLMLM',
            'imageurl' => 'https://pbs.twimg.com/media/CY2Pk__UQAA5E08.jpg:large'
        ]);
        DB::table('idols')->insert([
            'name' => 'Miyu Mochizuki',
            'group' => 'Banmon',
            'imageurl' => 'https://pbs.twimg.com/media/CaIaTq0UUAAf1y2.png:large'
        ]);
        DB::table('idols')->insert([
            'name' => 'Amanatsu Yuzu',
            'group' => 'Banmon',
            'imageurl' => 'https://pbs.twimg.com/profile_images/684772558617460737/vfcyzLcY.jpg'
        ]);
    }
}
