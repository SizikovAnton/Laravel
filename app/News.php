<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    protected $table = 'news';

    public function getAll()
    {
        return DB::table($this->table)->get();
    }

    public function getOneById(int $id)
    {
        return DB::table($this->table)->find($id);
    }

    // public function new($title, $description, $content, $status)
    // {
    //     return DB::table($this->table)->insert([
    //         'title'         => $title,
    //         'description'   => $description,
    //         'content'       => $content,
    //         'status'        => $status,
    //         'created_at'    => date("Y-m-d H:i:s"),
    //         'updated_at'    => date("Y-m-d H:i:s"),
    //     ]);
    // }

    public function getNewsByCategory(int $id)
    {
        return DB::table('news')
            ->join('news_categories', 'news.id', '=', 'news_categories.news_id')
            ->select('news.*')
            ->where('news_categories.category_id', '=', $id)
            ->get();
    }
}
