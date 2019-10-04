<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescriptionRecipesTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('description_recipes_translation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description_recipes_hr');
            $table->string('description_recipes_en');
            $table->string('description_recipes_de');
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
        Schema::dropIfExists('description_recipes_translation');
    }
}
