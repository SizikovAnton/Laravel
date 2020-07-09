<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'categories';

    public function getAll()
    {
        return DB::table($this->table)->get();
    }

    public function getOneById(int $id)
    {
        return DB::table($this->table)->find($id);
    }

    // public function setOne($name)
    // {
    //     return DB::table($this->table)->insert([
    //         'name'          => $name,
    //         'created_at'    => date("Y-m-d H:i:s"),
    //         'updated_at'    => date("Y-m-d H:i:s"),
    //     ]);
    // }
}
