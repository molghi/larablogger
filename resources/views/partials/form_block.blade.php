<div class="flex-1 text-white p-6">

    <!-- TITLE -->
    <div class="container mx-auto flex items-center justify-between relative">
        <a class="{{ config('tailwind.simple_btn_styles') }} bg-indigo-800" href="{{ $mode === 'add' ? '/posts' : "/posts/$entry->id" }}">Back</a>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 text-center mb-6 absolute left-1/2 transform -translate-x-1/2 top-[1px]">
            {{ ucwords($mode) }} Post
        </h1>
    </div>

    <!-- ADD/EDIT FORM -->
    <form action="{{ $form_action_path }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-6 max-w-2xl mx-auto">

    @csrf

    @if ($mode === 'edit')
        @method('PUT')
    @endif

    <!-- Title -->
    <div>
        <label for="title" class="cursor-pointer block text-sm font-medium text-gray-700 dark:text-blue-400">Title</label>
        <input name="title" type="text" id="title" autofocus="true" class="mt-1 {{ config('tailwind.general_input_styles') }} border-gray-500 border shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500"
            value="{{ $mode === 'edit' ? $entry->title : '' }}">
        
        @error ('title')
            <div class="{{ config('tailwind.error_msg_styles') }}">{{ $message }}</div>
        @enderror
    </div>

    <!-- Body -->
    <div>
        <label for="body" class="cursor-pointer block text-sm font-medium text-gray-700 dark:text-blue-400">Body <span class="text-red-500">*</span></label>
        <textarea name="body" id="body" rows="6" class="mt-1 {{ config('tailwind.general_input_styles') }} border-gray-500 border shadow-sm focus:border-indigo-500 min-h-[100px] focus:ring focus:ring-indigo-500">{{ $mode === 'edit' ? $entry->body : '' }}</textarea>
        
        @error ('body')
            <div class="{{ config('tailwind.error_msg_styles') }}">{{ $message }}</div>
        @enderror
    </div>

    <!-- Categories -->
    <div>
        <label for="categories" class="cursor-pointer block text-sm font-medium text-gray-700 dark:text-blue-400">Categories (optional)</label>
        <input name="categories" type="text" id="categories" class="mt-1 {{ config('tailwind.general_input_styles') }} border-gray-500 border shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500"
            value="{{ $mode === 'edit' ? $entry->categories : '' }}">

        @error ('categories')
            <div class="{{ config('tailwind.error_msg_styles') }}">{{ $message }}</div>
        @enderror
    </div>

  <!-- Cover Image & Visibility -->
  <div class="flex flex-col sm:flex-row sm:space-x-6 space-y-6 sm:space-y-0">
    <!-- Cover Image -->
    <div class="flex-1">
        <label for="cover_image" class="cursor-pointer block text-sm font-medium text-gray-700 dark:text-blue-400">Choose {{$mode==='edit' ? 'New' : ''}} Cover Image (optional)</label>
        <input name="cover_image" type="file" id="cover_image" accept="image/png, image/jpeg" class="mt-1 block w-full text-gray-700 dark:text-gray-200 cursor-pointer">
        
        @error ('cover_image')
            <div class="{{ config('tailwind.error_msg_styles') }}">{{ $message }}</div>
        @enderror
    </div>

    <!-- Visibility -->
    <div class="flex-1">
      <span class="block text-sm font-medium text-gray-700 dark:text-blue-400">Visibility <span class="text-red-500">*</span></span>
      <div class="mt-2 flex space-x-4">
        <label class="cursor-pointer inline-flex items-center" title="Visible only to you">
          <input name="visibility" type="radio" value="0" class="text-indigo-600 border-gray-300 focus:ring-indigo-500"
          {{ $mode === 'edit' && $entry->visibility == '0' ? 'checked' : '' }}>
          <span class="ml-2">Draft</span>
        </label>
        <label class="cursor-pointer inline-flex items-center" title="Visible to everybody">
          <input name="visibility" type="radio" value="1" class="text-indigo-600 border-gray-300 focus:ring-indigo-500" 
          @php
            $vis = '';
            $vis = $mode === 'edit' && $entry->visibility == '1' ? 'checked' : '';
            if ($mode === 'add') $vis = 'checked';
          @endphp
            {{ $vis }}>
          <span class="ml-2">Published</span>
        </label>
      </div>

      @error ('visibility')
            <div class="{{ config('tailwind.error_msg_styles') }}">{{ $message }}</div>
        @enderror
    </div>

    @if ($mode === 'edit')
        <input type="hidden" name="created_at" value="{{ $entry->created_at }}">
        <input type="hidden" name="id" value="{{ $entry->id }}">
    @endif

  </div>

  <!-- Submit Button -->
  <div>
    <button type="submit" class="{{ config('tailwind.simple_btn_styles') }} w-full shadow bg-indigo-600 {{ $mode === 'edit' ? 'bg-green-700' : '' }}">
        {{ ucwords($mode) }}    
    </button>
  </div>

  
   <!-- OUTPUT ERRORS -->
    </form>
</div>