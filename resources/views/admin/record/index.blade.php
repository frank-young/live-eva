@extends('layouts.app')

@section('content')
    <record-list :data="{{ $records }}"></record-list>
@endsection
