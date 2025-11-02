<form action="{{ route('user.create') }}" method="POST" class="max-w-sm mx-auto p-6 bg-gray-900 text-white rounded mt-10">

    @csrf

    <h2 class="text-2xl mb-4 text-center">Sign Up</h2>

    <input name="email" type="email" placeholder="Email" autofocus class="{{ config('tailwind.general_input_styles') }}">

    <input name="password" type="password" placeholder="Password" class="{{ config('tailwind.general_input_styles') }} mb-4">
  
    <input name="password_confirmation" type="password" placeholder="Repeat Password" class="{{ config('tailwind.general_input_styles') }} mb-4">

    <button class="w-full bg-green-600 {{ config('tailwind.simple_btn_styles') }}">Create Account</button>

    {{-- output possible errors --}}

    @error ('email')
        <div class="{{ config('tailwind.error_msg_styles') }}">{{ $message }}</div>
    @enderror

    @error ('password')
        <div class="{{ config('tailwind.error_msg_styles') }}">{{ $message }}</div>
    @enderror
    
</form>