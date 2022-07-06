<?php

namespace Database\Seeders;

use App\Models\ChildCategory;
use Illuminate\Database\Seeder;

class ChildCategorySeeder extends Seeder
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
                'title' => 'کیف و کاور گوشی',
                'parent_id' =>2,
                'status' => 1
            ],
            2 => [
                'title' => 'پاوربانک',
                'parent_id' =>2,
                'status' => 1
            ],
            3 => [
                'title' => 'پایه نگهدارنده گوشی',
                'parent_id' =>2,
                'status' => 1
            ],
            4 => [
                'title' => 'سامسونگ',
                'parent_id' =>3,
                'status' => 1
            ],
            5 => [
                'title' => 'هوآوی',
                'parent_id' =>3,
                'status' => 1
            ],
            6 => [
                'title' => 'اپل',
                'parent_id' =>3,
                'status' => 1
            ],
            7 => [
                'title' => 'شیائومی',
                'parent_id' =>3,
                'status' => 1
            ],
            8 => [
                'title' => 'انر',
                'parent_id' =>3,
                'status' => 1
            ],
            9 => [
                'title' => 'نوکیا',
                'parent_id' =>3,
                'status' => 1
            ],
            10 => [
                'title' => 'لوازم تزیینی',
                'parent_id' =>16,
                'status' => 1
            ],
            11 => [
                'title' => 'سیستم صوتی و تصویری',
                'parent_id' =>16,
                'status' => 1
            ],
            12 => [
                'title' => 'نظافت و نگهداری خودرو',
                'parent_id' =>16,
                'status' => 1
            ],
            13 => [
                'title' => 'کلاه کاسکت و لوازم جانبی موتور',
                'parent_id' =>16,
                'status' => 1
            ],
            14 => [
                'title' => 'دیسک و صفحه کلاج',
                'parent_id' =>17,
                'status' => 1
            ],
            15 => [
                'title' => 'تی شرت و پولوشرت',
                'parent_id' =>20,
                'status' => 1
            ],
            16 => [
                'title' => 'پیراهن',
                'parent_id' =>20,
                'status' => 1
            ],
            17 => [
                'title' => 'شلوار',
                'parent_id' =>20,
                'status' => 1
            ],
            18 => [
                'title' => 'لباس زیر',
                'parent_id' =>20,
                'status' => 1
            ],
            19 => [
                'title' => 'کفش روزمره',
                'parent_id' =>21,
                'status' => 1
            ],
            20 => [
                'title' => 'کفش رسمی',
                'parent_id' =>21,
                'status' => 1
            ],






        ];

        foreach ($categories as $category){
            $check = ChildCategory::where('title',$category['title'])->first();
            if (!$check){
                ChildCategory::create([
                    'title' => $category['title'],
                    'status' => $category['status'],
                    'parent_id' => $category['parent_id'],
                ]);
            }
        }
    }
}
