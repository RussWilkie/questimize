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
                'name' => 'Not Started',
                'color_hex_code' => '#D9534F',
            ),
            array(
                'id' => 2,
                'name' => 'In-Progress',
                'color_hex_code' => '#FF9B00',
            ),
            array(
                'id' => 3,
                'names' => 'Completed',
                'color_hex_code' => '#5CB85C',
            ),
        ));
    }
}
