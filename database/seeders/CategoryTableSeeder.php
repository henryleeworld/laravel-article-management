<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        Category::factory()->count(10)->create();
    }
}
