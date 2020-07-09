<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    public function getData()
    {
        $objFaker = Faker\Factory::create('ru_RU');

        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'name'         => $objFaker->word(),
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ];
        }

        return $data;
    }
}
