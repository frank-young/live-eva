@extends('layouts.app')

@section('content')
    <module-list :data="{{ $data['modules'] }}" :id=" {{ $data['id']}} " :name="'{{ $data['name'] }}'"></module-list>
@endsection
