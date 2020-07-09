<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    public function getAll()
    {
        return DB::table($this->table)->get();
    }

    public function getOneById(int $id)
    {
        return DB::table($this->table)->find($id);
    }

    public function new($name, $comment)
    {
        return DB::table($this->table)->insert([
            'name'          => $name,
            'comment'       => $comment,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s"),
        ]);
    }
}
