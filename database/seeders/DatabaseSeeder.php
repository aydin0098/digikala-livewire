<?php

namespace Database\Seeders;

use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CategorySeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(ChildCategorySeeder::class);

    }
}
