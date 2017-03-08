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

  // create module page
  public function create()
  {
    return view('admin/module/create');
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
    $module->paper_id = 1; // need save paper_id

    if ($module->save()) {
        return redirect('admin/module');
    } else {
        return redirect()->back()->withInput()->withErrors('保存失败！');
    }
  }
}
