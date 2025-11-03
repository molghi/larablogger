@extends('layouts.app')

@section('title', "$title | Easy Blogger")

@section('content')
    <h1 class="{{ config('tailwind.page_title_styles') }} mt-10">Your Posts</h1>
    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-500 text-center mb-2">Total posts count: {{ count($posts) }}</h2>

    @if (!empty($posts) && $posts && count($posts) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-y-4 gap-x-8 auto-cols-fr mt-10 mb-6 container mx-auto">
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