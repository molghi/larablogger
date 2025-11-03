@extends('layouts.app')

@section('title', "$title | Easy Blogger")

@section('content')
    @include('partials.post_page_block')
    @include('partials.comments_block')
    @include('partials.add_comment_form')
    @include('partials.success_msg')
@endsection