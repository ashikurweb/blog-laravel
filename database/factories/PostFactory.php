<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            return [
            'user_id' => 1,                             
            'title'   => fake()->sentence(),              
            'author'  => fake()->name(),                  
            'published_at' => now(),                     
            'content' => fake()->paragraph(3, true),      
            'category' => 'Laravel',
            'image'  => $this->faker->imageUrl(640, 480, 'animals', true, '', false, 'jpg')                       
        ];
    }
}
