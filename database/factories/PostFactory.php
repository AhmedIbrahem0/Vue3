<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model=Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoryIDS=Category::pluck('id');
        return [
            'category_id'=>$categoryIDS->random(),
            'name'=>$this->faker->title,
            'description'=>$this->faker->text(500)
        ];
    }
}
