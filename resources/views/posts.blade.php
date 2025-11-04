@php    
    $view_now = 'list';
    if (session('view')) $view_now = session('view');
@endphp

@extends('layouts.app')

@section('title', "$title | Easy Blogger")

@section('content')
    <h1 class="{{ config('tailwind.page_title_styles') }} mt-10">Your Posts</h1>
    {{-- <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-500 text-center mb-2">Total posts count: {{ count($posts) }}</h2> --}}

    {{-- Change view --}}
    <div class="flex justify-end items-center gap-4 transition opacity-40 hover:opacity-100 max-w-3xl mx-auto mt-3">
        <span class="text-[ivory]">View:</span>
        <a href="/posts/view/list" class="border {{ config('tailwind.simple_btn_styles') }} py-1 {{ $view_now === 'list' ? 'bg-[ivory] text-black pointer-events-none' : '' }}">List</a>
        <a href="/posts/view/grid" class="border {{ config('tailwind.simple_btn_styles') }} py-1 {{ $view_now === 'grid' ? 'bg-[ivory] text-black pointer-events-none' : '' }}">Grid</a>
    </div>

    @if (!empty($posts) && $posts && count($posts) > 0)
        <div class="mt-10 mb-6 container mx-auto {{ $view_now === 'grid' ? 'grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-y-4 gap-x-8 auto-cols-fr' : 'max-w-3xl' }}">
            @foreach ($posts as $post)
                @include('partials.post_block')
            @endforeach
        </div>
        <div class="pagination container mx-auto"> {{ $posts->links('pagination::tailwind') }} </div>
    @else 
        <div>No posts so far</div>
    @endif

    @include('partials.success_msg')
@endsection