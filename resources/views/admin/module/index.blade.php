@extends('layouts.app')

@section('content')
    <module-list :data="{{ $data->modules }}"></module-list>
@endsection
