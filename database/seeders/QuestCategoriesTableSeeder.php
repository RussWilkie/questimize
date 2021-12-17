<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuestCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('quest_categories')->insert(array(
            array(
                'id' => 1,
                'name' => 'Mini-Quest',
            ),
            array(
                'id' => 2,
                'name' => 'Ninja/Assassin',
            ),
            array(
                'id' => 3,
                'names' => 'Adventurer',
            ),
            array(
                'id' => 4,
                'name' => 'Wizard',
            ),
            array(
                'id' => 5,
                'name' => 'Ranger',
            ),
            array(
                'id' => 6,
                'names' => 'Scout',
            ),
            array(
                'id' => 7,
                'names' => 'Warrior',
            ),
            array(
                'id' => 8,
                'name' => 'Bard',
            ),
            array(
                'id' => 9,
                'name' => 'Jester',
            ),
            array(
                'id' => 10,
                'names' => 'Clergy',
            ),
            array(
                'id' => 11,
                'names' => 'Chef',
            ),
            array(
                'id' => 12,
                'names' => 'Hero',
            ),
            array(
                'id' => 13,
                'names' => 'Master',
            ),
        ));
    }
}
