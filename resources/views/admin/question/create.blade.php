@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">新建问卷</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>新增失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{ url('admin/paper') }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="text" name="question_name" class="form-control" required="required" placeholder="请输入标题"value="{{ old('question_name') }}">
                        <br>
                        <button class="btn btn-lg btn-info">确认</button>
                    </form>

                    <question-input :token="'{{ csrf_token() }}'"></question-input>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
