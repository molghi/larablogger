@extends('layouts.app')

@section('title', "$title | Easy Blogger")

@section('content')
    @include('partials.success_msg')

<div class="container mx-auto flex items-center justify-between relative mb-10 mt-8">
    <a class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 back-btn" href="/panel" title="Back to panel">Back</a>

    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 text-center mb-6 absolute left-1/2 transform -translate-x-1/2 top-[1px]">
        Update Your {{ ucwords($update_what) }}
    </h1>
</div>

@if ($update_what === 'username')
    <div class="max-w-3xl mx-auto p-6 space-y-4">
        <p class="text-lg text-gray-900 dark:text-gray-100 mb-8">
            Current username: <span class="font-bold text-blue-300"></span> <span class="text-purple-600">{{ $name ?? "__" }}</span> </p>

        <form action="/panel/update/username" method="POST" class="flex flex-col gap-6">
            @csrf 
            @method('PUT')
            
            <div>
                <input name="username" required="" autofocus="true" type="text" placeholder="New username" class="flex-1 {{ config('tailwind.general_input_styles') }} border w-full">
            </div>
            
            <button type="submit" class="inline-block max-w-[100px] {{ config('tailwind.simple_btn_styles') }} bg-blue-600">Update</button>

        </form>
        @error ('username')
            <div class="text-[red] p-2 px-3 mt-4 bg-black rounded border border-[red]">ERROR: {{$message}}</div>
        @enderror

    </div>
@else 
    <div class="max-w-3xl mx-auto p-6 space-y-4">
        <p class="text-lg text-gray-900 dark:text-gray-100 mb-8">
            Set your new password  </p>

        <form action="/panel/update/password" method="POST" class="flex flex-col gap-6">
            @csrf 
            @method('PUT')
            
            <div>
                <input name="password" required="" autofocus="true" type="password" placeholder="New Password" class="flex-1 {{ config('tailwind.general_input_styles') }} border w-full">
            </div>
            <div>
                <input name="password_confirmation" required="" type="password" placeholder="Repeat Password" class="flex-1 {{ config('tailwind.general_input_styles') }} border w-full">
            </div>
            
            <button type="submit" class="inline-block max-w-[100px] {{ config('tailwind.simple_btn_styles') }} bg-blue-600">Update</button>

        </form>
        @error ('password')
            <div class="text-[red] p-2 px-3 mt-4 bg-black rounded border border-[red]">ERROR: {{$message}}</div>
        @enderror

    </div>
@endif

@endsection