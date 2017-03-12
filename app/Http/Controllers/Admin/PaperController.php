<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Paper;
use App\Models\Module;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Report;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class PaperController extends Controller
{
  // 问卷列表页
  public function index()
  {
      $papers = Paper::all();
      return view('admin/paper/index', compact('papers'));
  }

  // 问卷详情，将会展示出所有的问卷类目
  public function show($id)
  {
      // 类目用了module这个词
      $modules = Module::where(['paper_id' => $id])->get();
      $data = ['id'=>$id, 'modules'=>$modules];   // 这里传入了id，是为了在类目中储存问卷的id
      return view('admin/paper/show', compact('data'));
  }

  // 创建问卷
  public function create()
  {
    return view('admin/paper/create');
  }

  // 创建问卷提交处理
  public function store(Request $request)
  {
    $this->validate($request, [
        'name' => 'required|unique:papers|max:255'
    ]);

    $paper = new Paper;
    $paper->name = $request->get('name');
    $paper->description = $request->get('description');
    $paper->user_id = $request->user()->id;

    if ($paper->save()) {
        return redirect('admin/paper');
    } else {
        return redirect()->back()->withInput()->withErrors('保存失败！');
    }
  }

  // 创建出完整的答卷 -> 这里是生成问卷
  public function produce($id)
  {
      $paper = Paper::find($id);
      $modules = Module::where(['paper_id' => $id])->get();
      foreach ($modules as $value) {
          $questions = Question::where(['module_id' => $value->id])->get();
          foreach ($questions as $v) {
              $answers = Answer::where(['question_id' => $v->id])->get();
              $v->answers = $answers;
          }
          $value->questions = $questions;
      }
      $paper->modules = $modules;
      // $data = ['errno'=>0, 'msg'=>'success', 'paper' => $paper];
      // $html =  view('admin/paper/report', compact('paper'))->__toString();
      // $path = 'static/report'.$id.'.html';
      // Storage::put($path, $html);

      return view('admin/paper/report', compact('paper'));
      // return Response::json($paper);
  }
  // 处理问卷提交信息
  public function reportCtrl(Request $request)
  {
      $report_id = $request->get('report_id');
      $paper = Paper::where(['id'=>$report_id])->first(['id','name']);
      $modules = Module::where(['paper_id' => $report_id])->get(['id','module_name']);
      foreach ($modules as $value) {
          $sum = 0;
          $questions = Question::where(['module_id' => $value->id])->get(['id', 'question_name']);
          foreach ($questions as $v) {
              $answer_id = $request->input('answers.'.$value->id.'.'.$v->id);
              $answer = Answer::where(['id' => $answer_id])->first(['answer_name', 'score']);
              $sum += $answer['score'];
              $v->answer_id = $answer_id;
              $v->answer_name = $answer['answer_name'];
          }
          $value->sum = $sum;
          $report = Report::where(['module_id' => $value->id])->where('min_score', '<=', $sum)->where('max_score', '>=', $sum)->first(['id', 'report_name', 'report_body','min_score', 'max_score']);
          $value->questions = $questions;
          $value->report = $report;
      }
      $paper->modules = $modules;
      $data = ['errno'=>0, 'msg'=>'success', 'paper'=>$paper];
      return Response::json($data);
  }
}
