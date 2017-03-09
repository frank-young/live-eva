<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Paper;
use App\Models\Module;

class PaperController extends Controller
{
  public function index()
  {
      $papers = Paper::all();
      return view('admin/paper/index', compact('papers'));
  }

  // show paper under module
  public function show($id)
  {
      $modules = Module::where(['paper_id' => $id])->get();
      $data = ['id'=>$id, 'modules'=>$modules];
      return view('admin/paper/show', compact('data'));
  }

  // create page
  public function create()
  {
    return view('admin/paper/create');
  }

  // post store ctrl
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
}
