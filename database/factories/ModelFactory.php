<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Category;
use App\CategoryTitleTranslation;
use App\DescriptionRecipeTranslation;
//use App\Ingredient;
//use App\IngredientRecipePivot;
use App\IngredientTitleTranslation;
use App\Language;
use App\Recipe;
//use App\RecipeTagPivot;
use App\RecipeTitleTranslation;
//use App\Tag;
use App\TitleTagTranslation;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Recipe::class, function (Faker $faker) {

    //making logic for created_at < updated_at < deleted_at
    $firstDate = $faker->date($format = 'Y-m-d', $max = 'now');
    do {
        $secondDate = $faker->date($format = 'Y-m-d', $max = 'now');
    } while ($secondDate < $firstDate);

    do {
        $thirdDate = $faker->date($format = 'Y-m-d', $max = 'now');
    } while ($thirdDate < $secondDate);

    return [
        'created_at' => $firstDate,
        'updated_at' => $secondDate,
        'deleted_at' => $thirdDate,
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    static $slugIncrementer = 1;
    return [
        'slug' => 'category-'.$slugIncrementer++,
        'recipe_id' => $faker->unique()->numberBetween($min = 1, $max = 10),
    ];
});

$factory->define(Language::class, function (Faker $faker) {
    static $idIncrementer = 0;
    
    $arrayOfLanguages = array("hr", "en", "de");
    return [
        'languages' => $arrayOfLanguages[$idIncrementer++],
    ];
});

$factory->define(RecipeTitleTranslation::class, function (Faker $faker) {
    $faker = \Faker\Factory::create();
    $faker->addProvider(new \FakerRestaurant\Provider\fr_FR\Restaurant($faker));
    static $idIncrementer = 1;
    return [
        'title_recipes_hr' => $faker->foodName(),
        'title_recipes_en' => $faker->vegetableName(),
        'title_recipes_de' => $faker->meatName(),
        'recipe_id' => $idIncrementer++,
    ];
});

$factory->define(CategoryTitleTranslation::class, function (Faker $faker) {
    static $idIncrementer = 1;
    return [
        'categories_title_hr' => $faker->name,
        'categories_title_en' => $faker->name,
        'categories_title_de' => $faker->name,
        'category_id' => $idIncrementer++,
    ];
});

$factory->define(DescriptionRecipeTranslation::class, function (Faker $faker) {
    static $idIncrementer = 1;
    return [
        'description_recipes_hr' => $faker->name,
        'description_recipes_en' => $faker->name,
        'description_recipes_de' => $faker->name,
        'recipe_id' => $idIncrementer++,
    ];
});

$factory->define(IngredientTitleTranslation::class, function (Faker $faker) {
    static $idIncrementer = 1;
    return [
        'title_ingredients_hr' => $faker->name,
        'title_ingredients_en' => $faker->name,
        'title_ingredients_de' => $faker->name,
        'ingredient_id' => $idIncrementer++,
    ];
});

$factory->define(TitleTagTranslation::class, function (Faker $faker) {
    static $idIncrementer = 1;
    return [
        'title_tags_hr' => $faker->name,
        'title_tags_en' => $faker->name,
        'title_tags_de' => $faker->name,
        'tag_id' => $idIncrementer++,
    ];
});

