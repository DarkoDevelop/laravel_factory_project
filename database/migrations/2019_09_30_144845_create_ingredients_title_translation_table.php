<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsTitleTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients_title_translation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_ingredients_hr');
            $table->string('title_ingredients_en');
            $table->string('title_ingredients_de');
            $table->integer('ingredient_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients_title_translation');
    }
}
