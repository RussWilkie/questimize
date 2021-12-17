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
                'name' => 'Ninja/Assassin Quest',
            ),
            array(
                'id' => 3,
                'names' => 'Adventurer Quest',
            ),
            array(
                'id' => 4,
                'name' => 'Wizard Quest',
            ),
            array(
                'id' => 5,
                'name' => 'Ranger Quest',
            ),
            array(
                'id' => 6,
                'names' => 'Scout Quest',
            ),
            array(
                'id' => 7,
                'names' => 'Warrior Quests',
            ),
            array(
                'id' => 8,
                'name' => 'Bard Quest',
            ),
            array(
                'id' => 9,
                'name' => 'Jester Quest',
            ),
            array(
                'id' => 10,
                'names' => 'Clergy Quest',
            ),
            array(
                'id' => 11,
                'names' => 'Chef Quest',
            ),
            array(
                'id' => 12,
                'names' => 'Hero Quest',
            ),
            array(
                'id' => 13,
                'names' => 'Master Quest',
            ),
        ));
    }
}
