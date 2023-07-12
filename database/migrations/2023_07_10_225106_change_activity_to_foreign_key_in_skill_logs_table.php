<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeActivityToForeignKeyInSkillLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skill_logs', function (Blueprint $table) {
            $table->dropColumn('activity');
            $table->bigInteger('activity_id')->unsigned()->index()->nullable()->after('sub_skill_id');
            $table->foreign('activity_id')->references('id')->on('sub_skills');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skill_logs', function (Blueprint $table) {
            $table->dropForeign('activity_id');
            $table->dropColumn('activity_id');
            $table->string('activity')->after('sub_skill_id');
        });
    }
}
