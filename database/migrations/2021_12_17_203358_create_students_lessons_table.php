<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_lessons', function (Blueprint $table) {
            $table->id()->length(11);
            //$table->foreign('id')->references('id')->on('lesson_id');
            //$table->foreign('id')->references('id')->on('student_id');
            $table->foreignUuid('lesson_id');
            $table->foreignUuid('student_id');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_lessons');
    }
}
