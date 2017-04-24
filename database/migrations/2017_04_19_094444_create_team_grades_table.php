<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_grades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assignment_id')->unsigned();
            $table->integer('checkpoint_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->text('comments')->nullable();
            $table->timestamps();

            $table->foreign('assignment_id')->references('id')->on('assignments');
            $table->foreign('checkpoint_id')->references('id')->on('checkpoints');
            $table->foreign('team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_grades');
    }
}
