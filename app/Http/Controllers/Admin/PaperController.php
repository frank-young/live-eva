<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Paper;
use App\Models\Module;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
// use Illuminate\View\View;

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
      foreach ($modules as $key => $value) {
          $questions = Question::where(['module_id' => $value->id])->get();
          foreach ($questions as $k => $v) {
              $answers = Answer::where(['question_id' => $v->id])->get();
              $v->answers = $answers;
          }
          $value->questions = $questions;
      }
      $paper->modules = $modules;
      // $data = ['errno'=>0, 'msg'=>'success', 'paper' => $paper];
      // $html =  view('admin/paper/report', compact('data'))->__toString();
      // $path = 'static/report'.$id.'.html';
      // Storage::put($path, $html);

      return view('admin/paper/report', compact('paper'));
      // return Response::json($data);
  }

}
