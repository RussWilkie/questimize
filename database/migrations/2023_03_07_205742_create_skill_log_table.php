<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_log', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sub_skill_id')->unsigned()->index()->nullable();
            $table->foreign('sub_skill_id')->references('id')->on('sub_skills');
            $table->string('activity');
            $table->integer('xp_value');
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skill_log');
    }
}
