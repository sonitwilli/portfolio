@extends('frontend.master')
@section('title',$web_title)
@section('content')

    @include('frontend.pages.port')

    @include('frontend.pages.about')

    @include('frontend.pages.contact')

    @include('frontend.block.footer')

@stop