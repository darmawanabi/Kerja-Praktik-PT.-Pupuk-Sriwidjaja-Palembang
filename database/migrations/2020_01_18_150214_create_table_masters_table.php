<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_masters', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement();
            $table->string('jenis');
            $table->string('nama')->unique();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->index('table_master_id');
            $table->foreign('table_master_id')->references('id')->on('table_masters')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_masters');
    }
}
