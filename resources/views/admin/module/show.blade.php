@extends('layouts.app')

@section('content')
    <module-list :data="{{ $data['modules'] }}" :id=" {{ $data['id'] }} "></module-list>
@endsection
