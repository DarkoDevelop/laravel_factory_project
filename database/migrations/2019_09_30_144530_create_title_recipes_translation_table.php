<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitleRecipesTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('title_recipes_translation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_recipes_hr');
            $table->string('title_recipes_en');
            $table->string('title_recipes_de');
            $table->integer('recipe_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('title_recipes_translation');
    }
}
