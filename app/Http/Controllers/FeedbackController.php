<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('feedback.index');
    }

    public function addFeedback(Request $request)
    {
        $name = $request->input('name');
        $comment = $request->input('comment');
        
        if ( (new Feedback())->new($name, $comment) ) {
            return view('feedback.success');
        } else {
            dd('Ошибка записи в БД');
        }
    }

    public function listFeedback($id = null)
    {
        $feedbacks = is_null($id) ? (new Feedback())->getAll() : (new Feedback())->getOneById($id);
        return view('feedback.list', ['feedbacks' => $feedbacks]);
    }
}
