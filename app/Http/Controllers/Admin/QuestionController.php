<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;

class QuestionController extends Controller
{
  public function index()
  {
      $questions = Question::all();
      return view('admin/question/index', compact('questions'));
  }

  // create page
  public function create()
  {
    return view('admin/question/create');
  }
  
  // post store ctrl
  public function store(Request $request)
  {
    $this->validate($request, [
        'question_name' => 'required|unique:questions|max:255'
    ]);

    $question = new Question;
    $question->question_name = $request->get('question_name');
    $question->module_id = 1;

    if ($question->save()) {
        return redirect('admin/question');
    } else {
        return redirect()->back()->withInput()->withErrors('保存失败！');
    }
  }
}
