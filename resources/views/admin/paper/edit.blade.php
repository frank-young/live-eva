@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">编辑问卷</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>编辑失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{ url('admin/paper/update') }}" method="post">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="put">
                        <input type="hidden" name="id" value="{{ $paper->id }}">
                        <input type="text" name="name" class="form-control" required="required" placeholder="请输入标题" value="{{ $paper->name }}">
                        <br>
                        <textarea name="description" rows="3" class="form-control" placeholder="请输入内容">{{ $paper->description }}</textarea>
                        <br>
                        <button class="btn btn-info">保存</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
