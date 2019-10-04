<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTitleTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_title_translation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_tags_hr')->unique();
            $table->string('title_tags_en')->unique();
            $table->string('title_tags_de')->unique();
            $table->integer('tag_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags_title_translation');
    }
}
