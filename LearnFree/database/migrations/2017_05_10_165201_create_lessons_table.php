<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('title')->default('new lesson');
            $table->text('description')->nullable();
            $table->text('video_link')->nullable();
            $table->integer('course_id')->unsigned();
            $table->timestamps();       //Добавляет столбец 'created_at', 'updated_at' временные метки
            $table->softDeletes();      //Добавляет столбец 'deleted_at' для 'мягкого' удаления
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
