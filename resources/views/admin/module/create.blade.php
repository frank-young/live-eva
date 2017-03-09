@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">新建问卷子模块</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>新增失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{ url('admin/module') }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="hidden" name="paper_id" value="{{$data['id']}} ">
                        <input type="text" name="module_name" class="form-control" required="required" placeholder="请输入标题"value="{{ old('module_name') }}">
                        <br>
                        <textarea name="description" rows="3" class="form-control"  placeholder="请输入内容">{{ old('name') }}</textarea>
                        <br>
                        <button class="btn btn-lg btn-info">确认</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
