<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
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
                'title' => 'لوازم جانبی گوشی',
                'category_id' =>1,
                'status' => rand(0,1)
            ],

            2 => [
                'title' => 'گوشی موبایل',
                'category_id' =>1,
                'status' => rand(0,1)
            ],
            3 => [
                'title' => 'واقعیت مجازی',
                'category_id' =>1,
                'status' => rand(0,1)
            ],
            4 => [
                'title' => 'هدفون ، هدست و هندزفری',
                'category_id' =>1,
                'status' => rand(0,1)
            ],
            5 => [
                'title' => 'اسپیکر بلوتوث و با سیم',
                'category_id' =>1,
                'status' => rand(0,1)
            ],
            6 => [
                'title' => 'هارد،فلش و SSD',
                'category_id' =>1,
                'status' => rand(0,1)
            ],
            7 => [
                'title' => 'دوربین',
                'category_id' =>1,
                'status' => rand(0,1)
            ],
            8 => [
                'title' => 'لوازم جانبی دوربین',
                'category_id' =>1,
                'status' => rand(0,1)
            ],
            9 => [
                'title' => 'تلسکوپ',
                'category_id' =>1,
                'status' => rand(0,1)
            ],
            10 => [
                'title' => 'کامپیوتر و لوازم جانبی',
                'category_id' =>1,
                'status' => rand(0,1)
            ],
            11 => [
                'title' => 'لب تاپ',
                'category_id' =>1,
                'status' => rand(0,1)
            ],
            12 => [
                'title' => 'لوازم جانبی لپ تاپ',
                'category_id' =>1,
                'status' => rand(0,1)
            ],
            14 => [
                'title' => 'تبلت',
                'category_id' =>2,
                'status' => rand(0,1)
            ],
            15 => [
                'title' => 'موتور سیکلت',
                'category_id' =>2,
                'status' => rand(0,1)
            ],
            16 => [
                'title' => 'لوازم جانبی خودرو',
                'category_id' =>2,
                'status' => rand(0,1)
            ],
            17 => [
                'title' => 'لوازم یدکی خودرو',
                'category_id' =>2,
                'status' => rand(0,1)
            ],
            18 => [
                'title' => 'لوازم مصرفی خودرو',
                'category_id' =>2,
                'status' => rand(0,1)
            ],
            19 => [
                'title' => 'مردانه',
                'category_id' =>3,
                'status' => rand(0,1)
            ],
            20 => [
                'title' => 'لباس مردانه',
                'category_id' =>3,
                'status' => rand(0,1)
            ],
            21 => [
                'title' => 'کفش مردانه',
                'category_id' =>3,
                'status' => rand(0,1)
            ],
            22 => [
                'title' => 'زنانه',
                'category_id' =>3,
                'status' => rand(0,1)
            ],
            23 => [
                'title' => 'لباس زنانه',
                'category_id' =>3,
                'status' => rand(0,1)
            ],



        ];

        foreach ($categories as $category){
            $check = SubCategory::where('title',$category['title'])->first();
            if (!$check){
                SubCategory::create([
                    'title' => $category['title'],
                    'status' => $category['status'],
                    'category_id' => $category['category_id'],
                ]);
            }
        }
    }
}
