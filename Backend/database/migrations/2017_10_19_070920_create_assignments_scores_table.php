<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments_scores', function (Blueprint $table) {
            $table->increments('assignment_score_id');
            $table->integer('assignment_id')->unsigned();
            $table->foreign('assignment_id')->references('assignment_id')->on('assignments');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->string('score');
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
        Schema::dropIfExists('assignments_scores');
    }
}
