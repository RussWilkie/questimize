<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //This is to populate test data for fresh migrations
        \DB::table('quests')->insert(array(
            array(
                'id' => 1,
                'title' => 'Go Skinny Dipping',
                'description' => 'Go Skinny Dipping',
                'quest_status_id' => 3,
                'quest_category_id' => 1,
            ),
            array(
                'id' => 2,
                'title' => 'Earn a Masters Degree',
                'description' => 'Obtain a masters degree',
                'quest_status_id' => 2,
                'quest_category_id' => 4,
            )
            ));

            \DB::table('skills')->insert(array(
                array(
                    'id' => 1,
                    'name' => 'Stamina',
                    'level' => 1,
                    'xp_earned' => 1,
                    'xp_to_next_level' => 100
                ),
                array(
                    'id' => 2,
                    'name' => 'Adventuring',
                    'level' => 1,
                    'xp_earned' => 1,
                    'xp_to_next_level' => 100
                )
                ));

                \DB::table('sub_skills')->insert(array(
                    array(
                        'id' => 1,
                        'skill_id' => 2,
                        'name' => 'Hiking',
                        'level' => 1,
                        'xp_earned' => 1,
                        'xp_to_next_level' => 100
                    ),
                    array(
                        'id' => 2,
                        'skill_id' => 2,
                        'name' => 'Walking',
                        'level' => 1,
                        'xp_earned' => 1,
                        'xp_to_next_level' => 100
                    ),
                    array(
                        'id' => 3,
                        'skill_id' => 1,
                        'name' => 'Running',
                        'level' => 1,
                        'xp_earned' => 1,
                        'xp_to_next_level' => 100
                    ),
                    ));

                \DB::table('activities')->insert(array(
                    array(
                        'id' => 1,
                        'sub_skill_id' => 1,
                        'name' => 'Session',
                        'default_xp_value' => 1
                    ),
                    array(
                        'id' => 2,
                        'sub_skill_id' => 1,
                        'name' => 'Chapter Read',
                        'default_xp_value' => 3
                    ),
                    array(
                        'id' => 3,
                        'sub_skill_id' => 3,
                        'name' => 'Session',
                        'default_xp_value' => 3
                    )
                    ));

                \DB::table('skill_logs')->insert(array(
                    array(
                        'id' => 1,
                        'sub_skill_id' => 1,
                        'activity_id' => 1,
                        'xp_value' => 1,
                        'notes' => '.5 hour hiking',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ),
                    array(
                        'id' => 2,
                        'sub_skill_id' => 1,
                        'activity_id' => 1,
                        'xp_value' => 3,
                        'notes' => '1.5 hour hiking',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    )
                ));
                    
    }
}
