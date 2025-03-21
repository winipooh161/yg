@extends('layouts.app')
@section('content')
    @include('layouts/header')
    @include('home/page')
    @include('home/info')
    @include('home/advantages')
    @include('form/form-one')
    @include('home/cards')
    @include('home/services')
    @include('form/form-two')
    @include('gallery/gallery')
    @include('home/map')
    @include('form/form-three')
    @include('home/tabs')
    @include('home/avtor')
    @include('home/feedback')
    {{-- @include('home/team') --}}
    @include('home/faq')
    @include('form/form-five')
    @include('layouts/quiz')
    @include('layouts/footer')
@endsection
