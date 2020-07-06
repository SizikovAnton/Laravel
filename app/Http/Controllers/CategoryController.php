<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categories = array();

    function __construct()
    {
        $this->generateData();
    }

    //TODO Убрать когда появятся модели
    /**
     * Метод генерирует категории для массива $categories
     */
    private function generateData()
    {
        if(empty($this->categories)) {
            $numberCategories = 5;  //Кол-во создаваемых категорий
            $numberNews = 4;        //Кол-во создаваемых новостей в каждой категории
            for($i = 0; $i < $numberCategories; $i++) {
                $this->categories[] = [
                    'id' => $i,
                    'name' => "Category {$i}",
                ];
            }
        }
    }

    public function getCategory($id = null)
    {
        return is_null($id) ? $this->categories : $this->categories[$id];
    }

    public function index()
    {
        return view('category.index', ['categories' => $this->getCategory()]);
    }

    public function category($id)
    {
        $newsController = new NewsController(); //TODO Переделать когда дойдем до моделей
        $outputNews = array();
        
        for($i = 0; $i < count($newsController->getNews()); $i++) {
            if($newsController->getNews($i)['category'] == $id) $outputNews[] = $newsController->getNews($i);
        }

        return view('category.category', ['category' => $this->getCategory($id), 'news' => $outputNews]);
    }
}
