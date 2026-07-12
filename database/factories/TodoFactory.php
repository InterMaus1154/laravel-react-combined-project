<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isChecked = $this->faker->boolean(30);
        return [
            'user_id' => User::factory(),
            'category_id' => Category::query()->inRandomOrder()->value('id'),
            'title' => substr($this->faker->sentence(rand(2, 5), true), 0, 50),
            'description' => $this->faker->optional(0.4)->sentence(rand(5, 20)),
            'is_checked' => $isChecked,
            'checked_at' => $isChecked ? $this->faker->dateTimeBetween('-1 month', 'now') : null
        ];
    }

    public function checked(): static
    {
        return $this->state(fn(array $attributes) => [
           'is_checked' => true,
           'checked_at' => $this->faker->dateTimeBetween('-1 month', 'now')
        ]);
    }

    public function unchecked(): static
    {
        return $this->state(fn(array $attributes) => [
           'is_checked' => false,
           'checked_at' => null
        ]);
    }
}
