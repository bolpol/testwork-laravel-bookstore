<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BookListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('books');
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('author', 60);
            $table->string('title', 100)->unique();
            $table->integer('pages');
            $table->longText('describe');
            $table->string('image_mimetype', 20);
        });
            \Illuminate\Support\Facades\DB::statement("ALTER TABLE `books` ADD `image` MEDIUMBLOB");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
