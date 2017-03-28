<?php

namespace App\Http\Controllers\Admin;

use App\Models\Record;
use App\Models\Customer;
use App\Models\Customer_record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecordController extends Controller
{
  public function index()
  {
    $customers = Customer::all();
    foreach ($customers as $customer) {
      $records = Record::where(['customer_id' => $customer->id])->get();
      $reports = Customer_record::where(['customer_id' => $customer->id])->first();
      $customer->record = $records;
      $customer->report = $reports;
    }
    return view('admin/record/index', compact('customers'));
  }
}
