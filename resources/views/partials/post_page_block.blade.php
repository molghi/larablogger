<article class="mt-10 rounded-xl shadow post-block" data-post-id="{{ $post->id }}">
  
    <!-- Title -->
    <div class="container mx-auto flex items-center justify-between relative mb-4">
        <a title="Back to posts" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 back-btn" href="/posts">Back</a>
        
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 text-center mb-6 absolute left-1/2 transform -translate-x-1/2 top-[1px]">
            @if ($post->title)
                {{ $post->title }}
            @else
                Journal Entry '{{ substr(date('Y-m-d', strtotime($post->created_at)), 2) }} ({{ date('D', strtotime($post->created_at)) }})
            @endif 
        </h1>

        @if ($is_your_post)
            <div class="flex gap-4">
                <a title="Edit post" class="bg-blue-700 {{ config('tailwind.simple_btn_styles') }} opacity-40 hover:opacity-100" href="/posts/edit/{{$post->id}}">Edit</a>
                <form action="{{ route('post.delete', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    {{-- <input type="hidden" value="{{ $post->id }}"> --}}
                    <button onclick="return confirm(`Are you sure you want to delete this post?\n\nThis action cannot be undone.`)" type="submit" title="Delete post" class="bg-red-600 {{ config('tailwind.simple_btn_styles') }} opacity-40 hover:opacity-100">Delete</button>
                </form>
            </div>
        @endif 
    </div>

    <div class="max-w-3xl mx-auto p-6">
    
    <!-- Image -->
    @if ($post->cover_image)
        <div class="mb-6 overflow-hidden rounded-lg">
            <img src="{{ asset('storage/' . $post->cover_image) }}" alt="Post image cover" class="w-full object-cover max-h-[450px] transition-transform duration-1000 ease-in-out hover:scale-105 shadow-md">
        </div>
    @endif
  
  <!-- Body -->
  <div class="text-gray-700 dark:text-gray-300 mb-10 post-body whitespace-pre-line">
    {{ $post->body }}
  </div>

  <!-- Categories -->
   
    <div class="flex justify-between text-[13px] text-gray-500 mb-4">
        <div>
            <div class="mb-2">
                <span class="font-bold">Author: </span> You
            </div>
            <div>
                <span class="font-bold">Visibility: </span> {{ $post->visibility == 0 ? 'Draft' : 'Published' }}
            </div>
        </div>
        <div>
            <div class="mb-2 flex gap-2">
                <span class="font-bold min-w-[70px]">Created: </span>
                <span class="post-created inline-block text-right min-w-[121px]">{{ substr($post->created_at, 0, -3) }}</span>
            </div>
            <div class="flex gap-2">
                <span class="font-bold min-w-[70px]">Modified: </span>
                <span class="post-created inline-block text-right min-w-[121px]">{{ substr($post->updated_at, 0, -3) }}</span>
            </div>
        </div>
    </div>

  <!-- Divider -->
  <hr class="border-gray-700 mt-10 mb-5">

  </div>

</article>