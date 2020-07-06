<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    private function getFeedback($id = null)
    {
        $fileName = storage_path('app/public/feedback.json');
        $file = file_get_contents($fileName);
        $feedbacks = json_decode($file, true);

        return is_null($id) ? $feedbacks : $feedbacks[$id];
    }

    public function index()
    {
        return view('feedback.index');
    }

    public function addFeedback(Request $request)
    {
        $name = $request->input('name');
        $comment = $request->input('comment');
        $feedbacks = array();

        $fileName = storage_path('app/public/feedback.json');

        //TODO Изменить когда пройдем модели
        
        if(file_exists($fileName)){
            $file = file_get_contents($fileName);
            $feedbacks = json_decode($file, true);
        }

        $feedbacks[empty($feedbacks) ? 0 : count($feedbacks)] = ['name' => $name, 'comment' => $comment];
        file_put_contents($fileName, json_encode($feedbacks));

        return view('feedback.success');
    }

    public function listFeedback($id = null)
    {
        return view('feedback.list', ['feedbacks' => $this->getFeedback($id)]);
    }
}
