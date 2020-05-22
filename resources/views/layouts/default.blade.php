@extends('layouts.common')
@section('title', 'Home')
@section('content')
    <div class="relative bg-white overflow-hidden">
        <div class="max-w-screen-xl mx-auto h-full">
            <div x-data="{open: false}"
                 class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                @include('layouts.header')
                @yield('real-content')
            </div>
        </div>
        @yield('extend-content')
    </div>
@stop
