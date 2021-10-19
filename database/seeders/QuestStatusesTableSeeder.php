<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuestStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('quest_statuses')->insert(array(
            array(
                'id' => 1,
                'status' => 'Not Started',
                'color_hex_code' => '#D9534F',
            ),
            array(
                'id' => 2,
                'status' => 'In-Progress',
                'color_hex_code' => 'FF9B00',
            ),
            array(
                'id' => 3,
                'status' => 'Completed',
                'color_hex_code' => '5CB85C',
            ),
        ));
    }
}
