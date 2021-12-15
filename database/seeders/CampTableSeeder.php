<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Camp;

class CampTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $camps = [
            [
                'title' => 'Gila Belajar',
                'slug' => 'gila-belajar',
                'price' => '280',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],

            [
                'title' => 'Baru Mulai',
                'slug' => 'baru-mulai',
                'price' => '140',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ]
        ];

        // cara seed 1
        // foreach ($camps as $key => $camp) {
        //     Camps::create($camp);
        // }

        // cara seed 2
        Camp::insert($camps);
    }
}
