@extends('layouts.default')
@section('title', 'Show')
@section('extend-content')
    <div class="table h-64 text-center w-full">
        <span class="table-cell align-middle">{{$user->email}}</span>
    </div>
@stop
