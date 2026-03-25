<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @author Robby Tan
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'isbn' => $this->faker->isbn13(),
      'title' => $this->faker->sentence(3),
      'author' => $this->faker->name(),
      'description' => $this->faker->paragraph(),
      'publish_year' => $this->faker->year(),
      'cover' => null,
      'category_id' => 1,
    ];
  }
}
