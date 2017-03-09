<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Response;

class QuestionController extends Controller
{
  public function index()
  {
      // $questions = Question::all();
      // return view('admin/question/index', compact('questions'));
  }

  // create page
  public function show($id)
  {
    $data = ['id' => $id];
    return view('admin/question/show', compact('data'));
  }

  public function apiShow($id)
  {
    $questions = Question::where(['module_id' => $id])->get();

    $data = ['errno'=>0, 'msg'=>'success','questions' => $questions];
    return Response::json($data);
  }

  public function edit($id)
  {
    $question = Question::where(['id' => $id])->first();
    $answers = Answer::where(['question_id' => $id])->get();

    $data = ['errno'=>0, 'msg'=>'success', 'question' => $question, 'answers' => $answers];
    return Response::json($data);
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
    $question->module_id = $request->get('module_id');

    if ($question->save()) {
        $this::_save($request->get('len'), $request, $question->id);

        $data = ['errno'=>0, 'msg'=>'success'];
		    return Response::json($data);
    } else {
        return redirect()->back()->withInput()->withErrors('保存失败！');
    }
  }
  public function _save($len, $request, $id)
  {
    for($i = 0;$i<$len;$i++){
        $answer = new Answer;
        $answer->answer_name = $request->get('answer_name'."$i");
        $answer->score = $request->get('score'."$i");
        $answer->question_id = $id;
        $answer->save();
    }
  }
}
