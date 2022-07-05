<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            1 => [
                'title' => 'کالای دیجیتال',
                'status' => rand(0,1)
            ],

            2 => [
                'title' => 'خودرو ، ابزار و تجهیزات صنعتی',
                'status' => rand(0,1)
            ],
            3 => [
                'title' => 'مد و پوشاک',
                'status' => rand(0,1)
            ],
            5 => [
                'title' => 'اسباب بازی ، کودک و نوزاد',
                'status' => rand(0,1)
            ],
            6 => [
                'title' => 'کالاهای سوپرمارکتی',
                'status' => rand(0,1)
            ],
            7 => [
                'title' => 'زیبایی و سلامت',
                'status' => rand(0,1)
            ],
            8 => [
                'title' => 'خانه و آشپزخانه',
                'status' => rand(0,1)
            ],
            9 => [
                'title' => 'کتاب ، لوازم تحریر و هنر',
                'status' => rand(0,1)
            ],
            10 => [
                'title' => 'ورزش و سفر',
                'status' => rand(0,1)
            ],


        ];

        foreach ($categories as $category){
            $check = Category::where('title',$category['title'])->first();
            if (!$check){
                Category::create([
                    'title' => $category['title'],
                    'status' => $category['status']
                ]);
            }
        }
    }
}
