<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $categories = array();
    private $news = array();

    /**
     * Метод генерирует категории и новости для массивов $categories и $news
     */
    private function generateData()
    {
        if(empty($this->categories)) {
            $numberCategories = 5;  //Кол-во создаваемых категорий
            $numberNews = 4;        //Кол-во создаваемых новостей в каждой категории
            for($i = 0; $i < $numberCategories; $i++) {
                $this->categories[] = ['name' => "Category {$i}"];
                for($j = 0; $j < $numberNews; $j++) {
                    $this->news[] = [
                        'id' => count($this->news),
                        'name' => "News {$j}",
                        'category' => $i,
                        'description' => "This is description from news {$j}",
                        'content' => "This is news {$j} from category {$i}",
                    ];
                }
            }
        }
    }

    private function getCategory($id = null)
    {
        return $id === null ? $this->categories : $this->categories[$id];
    }

    private function getNews($id = null)
    {
        return $id === null ? $this->news : $this->news[$id];
    }

    function __construct()
    {
        $this->generateData();
    }

    public function index() 
    {
        return view('news.index', ['categories' => $this->getCategory()]);
    }

    public function category($id)
    {
        $outputNews = array();
        
        for($i = 0; $i < count($this->getNews()); $i++) {
            if($this->getNews($i)['category'] == $id) $outputNews[] = $this->getNews($i);
        }

        return view('news.category', ['category' => $this->getCategory($id), 'news' => $outputNews]);
    }

    public function news($id)
    {
        return view('news.news', ['news' => $this->getNews($id)]);
    }

    public function createNews()
    {
        return view('news.create');
    }
}
