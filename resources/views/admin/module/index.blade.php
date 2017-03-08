@extends('layouts.app')

@section('content')
    <module-list :data="{{ $modules }}"></module-list>
@endsection
