<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Support\Facades\Response;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin/report/report');
    }
    // 报告新建和编辑。
    public function show($id)
    {
        return view('admin/report/show', compact('id'));
    }

    // 展示报告列表
    public function listShow($id)
    {
        $reports = Report::where(['module_id' => $id])->get();
        $data = ['errno'=>0, 'msg'=>'success','reports' => $reports];
        return Response::json($data);
    }

    public function edit($id)
    {
        $report = Report::where(['id' => $id])->first();

        $data = ['errno'=>0, 'msg'=>'success', 'report' => $report];
        return Response::json($data);
    }

    // post store ctrl
    public function store(Request $request)
    {
        $this->validate($request, [
            'report_name' => 'required|unique:reports|max:255',
            'report_body' => 'required',
            'min_score' => 'required',
            'max_score' => 'required'
        ]);

        $report = new Report;
        $report->report_name = $request->get('report_name');
        $report->report_body = $request->get('report_body');
        $report->min_score = $request->get('min_score');
        $report->max_score = $request->get('max_score');
        $report->module_id = $request->get('module_id');

        if ($report->save()) {
            $data = ['errno'=>0, 'msg'=>'success'];
    		    return Response::json($data);
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }

    // post update ctrl
    public function update(Request $request)
    {
        $this->validate($request, [
            'report_name' => 'required|max:255',
            'report_body' => 'required',
            'min_score' => 'required',
            'max_score' => 'required'
        ]);

        $report = Report::find($request->get('id'));
        $report->report_name = $request->get('report_name');
        $report->report_body = $request->get('report_body');
        $report->min_score = $request->get('min_score');
        $report->max_score = $request->get('max_score');

        if ($report->save()) {
            $data = ['errno'=>0, 'msg'=>'success'];
    		    return Response::json($data);
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }

}
