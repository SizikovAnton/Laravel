<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Http\Controllers\CategoryController; //TODO Убрать когда появятся модели

class TopMenu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //TODO Убрать или изменить когда появятся модели
    public function getCategories()
    {
        $categoryController = new CategoryController();
        return $categoryController->getCategory();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.top-menu', ['categories' => $this->getCategories()]);
    }
}
