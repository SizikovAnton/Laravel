<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() 
    {
        return view('news.index', ['news' => (new News())->getAll()]);
    }

    public function news($id)
    {
        return view('news.news', ['news' => (new News())->getOneById($id)]);
    }

    // public function createNews()
    // {
    //     return view('news.create');
    // }
}
