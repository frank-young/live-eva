@extends('layouts.app')

@section('content')
    <record-list :data="{{ $customers }}"></record-list>
@endsection
