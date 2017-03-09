<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Module;

class ModuleController extends Controller
{
  public function index()
  {
      $modules = Module::all();
      return view('admin/module/index', compact('modules'));
  }

  public function show($id)
  {
      $modules = Module::where(['paper_id' => $id])->get();
      $data = ['id'=>$id, 'modules'=>$modules];
      return view('admin/module/show', compact('data'));
  }

  // create module page
  public function create(Request $request)
  {
      $id = $request->get('id');
      $data = ['id' => $id];
      return view('admin/module/create', compact('data'));
  }

  // post store ctrl
  public function store(Request $request)
  {
    $this->validate($request, [
        'module_name' => 'required|unique:modules|max:255'
    ]);

    $module = new Module;
    $module->module_name = $request->get('module_name');
    $module->description = $request->get('description');
    $module->paper_id = $request->get('paper_id');

    if ($module->save()) {
        return redirect('admin/module/'.$module->paper_id);
    } else {
        return redirect()->back()->withInput()->withErrors('保存失败！');
    }
  }
}
