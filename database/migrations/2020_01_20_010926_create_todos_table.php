<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement();
            $table->integer('post_id')->unsigned();
            $table->integer('repeat');
            $table->date('when');
            $table->string('to');
        });

        Schema::table('todos', function (Blueprint $table) {
            $table->index('post_id');
            $table->foreign('post_id')->references('id')->on('posts');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
