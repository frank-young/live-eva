<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Module;

class ModuleController extends Controller
{
  public function show($id)
  {
      return view('admin/module/show', compact('id'));
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
        return redirect('admin/module/'.$module->id);
    } else {
        return redirect()->back()->withInput()->withErrors('保存失败！');
    }
  }


  // 编辑类目，修改了原来的url
  public function edit($id)
  {
      $module = Module::where(['id' => $id])->first();
      return view('admin/module/edit', compact('module'));
  }

  // 编辑类目处理
  public function update(Request $request)
  {
      $this->validate($request, [
          'module_name' => 'required|max:255'
      ]);
      $module = Module::where('id', $request->get('id'))->first();
      $module->module_name = $request->get('module_name');
      $module->description = $request->get('description');
      if ($module->save()) {
          return redirect('admin/paper/'.$module->paper_id);
      } else {
          return redirect()->back()->withInput()->withErrors('保存失败！');
      }

  }
}
