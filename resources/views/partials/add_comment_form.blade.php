<form action="{{ route('comment.add') }}" method="POST" class="max-w-2xl mx-auto p-4 rounded-xl shadow">
    @csrf 
    
    <label for="comment-body" class="block text-lg font-medium text-gray-300 mb-1">
        Add a Comment
    </label>

    <textarea id="comment-body" name="body" rows="3" required="" class="{{ config('tailwind.general_input_styles') }} border border-gray-500  focus:ring-2 focus:ring-blue-500 min-h-[50px] max-h-[300px]"></textarea>

    <input type="hidden" name="post_id" value="{{ $post->id }}">

    <button type="submit" class="mt-3 {{ config('tailwind.simple_btn_styles') }} bg-blue-700">
        Post Comment
    </button>

    {{-- OUTPUT ERRORS --}}
    @error ('body')
        <div class="{{ config('tailwind.error_msg_styles') }}">{{ $message }}</div>
    @enderror
    
    @error ('post_id')
        <div class="{{ config('tailwind.error_msg_styles') }}">{{ $message }}</div>
    @enderror
    
</form>