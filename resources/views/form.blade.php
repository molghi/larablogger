@php
    $form_action_path = $mode === 'add' ? route('post.add') : route('post.edit', $entry->id);
    $mode_for_title = ucwords($mode);
@endphp

@extends('layouts.app')

@section('title', "$mode_for_title Post | Easy Blogger")

@section('content')
    @include('partials.form_block')
    @include('partials.success_msg')
@endsection