@extends('layouts.app')

@section('title', 'Signup | Easy Blogger')

@section('content')
    @include('partials.signup_form')
    @include('partials.success_msg')
@endsection