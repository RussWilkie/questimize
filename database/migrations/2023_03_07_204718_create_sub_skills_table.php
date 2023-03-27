<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_skills', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('skill_id')->unsigned()->index()->nullable();
            $table->foreign('skill_id')->references('id')->on('skills');
            $table->string('name');
            $table->integer('level')->default(1);
            $table->integer('xp_earned')->default(0);
            $table->integer('xp_to_next_level')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_skills');
    }
}
