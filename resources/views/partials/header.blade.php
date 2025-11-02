@php
    $user_id = Auth::id();
@endphp

<header class="p-4 bg-gray-900 text-white">
    <div class="{{ config('tailwind.container_styles') }} w-full flex items-center justify-between">

        <div class="text-2xl font-bold">Easy Blogger</div>

        <div class="flex gap-5">
            @if ($user_id)
                <button class="{{config('tailwind.simple_btn_styles')}} bg-indigo-600">Add Post</button>
                <button class="{{config('tailwind.simple_btn_styles')}} bg-green-600">User Panel</button>
                <button class="{{config('tailwind.simple_btn_styles')}} bg-gray-700">Log Out</button>
            @else 
                <a href="/login" class="{{config('tailwind.simple_btn_styles')}} bg-blue-600">Login</a>
                <a href="/signup" class="{{config('tailwind.simple_btn_styles')}} bg-green-600">Sign Up</a>
            @endif 
        </div>
  </div>
</header>
