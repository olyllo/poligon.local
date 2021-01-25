<?php

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=[];

        $cName = 'Без категории';
        $categories=[[
            'title'     => $cName,
            'slug'      => Str::slug($cName),
            'parent_id' => 0,
        ]
        ];

        for($i = 1; $i <= 10; $i++){
            $cName='Категория №'.$i;
            $parentId = ($i > 4) ? rand(1,4) : 1;

            $categories_cur=[
                'title'     => $cName,
                'slug'      => Str::slug($cName),//https://laravel.com/docs/5.7/helpers#method-str-slug
                'parent_id' => $parentId,
            ];
            array_push($categories,$categories_cur);
            //var_dump($categories);
            
        }

        DB::table('blog_categories')->insert($categories);
    }
}
