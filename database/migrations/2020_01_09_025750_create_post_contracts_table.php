<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement();
            $table->string('jenis');
            $table->uuid('uuid')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('table_master_id')->unsigned();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->string('nama');
            $table->string('file')->nullable();
            $table->string('kategori')->nullable();
            $table->date('tanggal_berakhir')->nullable();
            $table->text('keterangan');
            $table->timestamps();
        });

        Schema::create('contracts', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement();
            $table->uuid('uuid')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->string('file')->nullable();
            $table->text('keterangan');
            $table->timestamps();
        });

        Schema::create('perizinans', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement();
            $table->uuid('uuid')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->string('file')->nullable();
            $table->text('keterangan');
            $table->timestamps();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('contracts', function (Blueprint $table) {
            $table->index('user_id');
            $table->index('post_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });

        Schema::table('perizinans', function (Blueprint $table) {
            $table->index('user_id');
            $table->index('post_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('contracts');
        Schema::dropIfExists('perizinans');
    }
}
