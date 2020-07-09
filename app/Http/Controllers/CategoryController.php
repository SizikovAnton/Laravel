<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index', ['categories' => (new Category())->getAll()]);
    }

    public function category($id)
    {
        return view('category.category', ['category' => (new Category())->getOneById($id), 'news' => (new News())->getNewsByCategory($id)]);
    }
}
