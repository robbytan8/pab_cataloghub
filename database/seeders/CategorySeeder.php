<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * @author Robby Tan
 * @extends Seeder
 */
class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('category')->insert([
      [
        'name' => 'Food',
        'description' => 'All about food and beverages.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'Technology',
        'description' => 'Latest trends in technology.',
        'created_at' => now(),
        'updated_at' => now(),
      ]
    ]);
    Category::factory()->count(5)->create();
    Category::factory(10)->create();
  }
}
