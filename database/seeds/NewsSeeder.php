<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objFaker = Faker\Factory::create('ru_RU');
        $categories = DB::table('categories')->get();

        foreach ($categories as $category) {
            for ($i = 0; $i < 10; $i++) {
                $content = $objFaker->realText();
                $data = [
                    'title'          => $objFaker->sentence(2),
                    'description'   => mb_substr($content, 0, 100),
                    'content'       => $content,
                    'status'        => 'published',
                    'created_at'    => date("Y-m-d H:i:s"),
                    'updated_at'    => date("Y-m-d H:i:s"),
                ];
                $news_id = DB::table('news')->insertGetId($data);
                DB::table('news_categories')->insert(['news_id' => $news_id, 'category_id' => $category->id]);
            }
        }
    }
}
