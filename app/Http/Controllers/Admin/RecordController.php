<?php

namespace App\Http\Controllers\Admin;

use App\Models\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecordController extends Controller
{
  public function index()
  {
    $records = Record::all();
    return view('admin/record/index', compact('records'));
  }
}
