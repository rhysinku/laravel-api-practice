<?php

namespace Database\Factories;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    // /**
    //  * Define the model's default state.
    //  *
    //  * @return array<string, mixed>
    //  */
    // public function definition(): array
    // {

    //     return [
    //         'name'=>fake()->name(),
    //         'comment_data'=>fake()->paragraph(),
            
    //         //
    //     ];
    // }


    public function definition(): array
    {
        return [
            'parent_comment_id' => null,
            'name' => $this->faker->name,
            'comment_data' => $this->faker->sentence,
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }

    /**
     * Indicate that the comment has three replies.
     *
     * @return \Database\Factories\CommentFactory
     */
    public function withReplies(): CommentFactory
    {
        return $this->has(Comment::factory()->count(3), 'replies');
    }

  
}