@extends('layouts.app')

@section('content')
    <paper-list :data="{{ $papers }}"></paper-list>
@endsection
