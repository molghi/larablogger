<div class="relative mx-auto bg-gray-900 p-6 rounded-lg shadow-md space-y-4 mb-7 post w-full" 
    data-post-id="{{ $post->id }}">
    
    <!-- Cover Image -->
    <div class="hover:opacity-70 transition-all duration-300">
        @if ($post->cover_image)
            <a href="/posts/{{$post->id}}">
                <img src="{{ asset('storage/' . $post->cover_image) }}" alt="Post cover image" class="w-full max-h-[250px] rounded-md object-cover min-h-[200px]">
            </a>
        @else
            <a href="/posts/{{$post->id}}" class="block w-full max-h-[250px] min-h-[200px] flex items-center justify-center bg-[#333] rounded-md overflow-hidden no-image">
                <span class="relative z-[1] text-[#ccc] italic text-xl">No Image</span>
            </a>
        @endif 
    </div>
    
    <!-- Title -->
    <h2 class="text-xl font-bold text-gray-100 post-title hover:underline inline-block">
        <a href="/posts/{{$post->id}}">
            @if ($post->title)
                {{ $post->title }}
            @else
                Journal Entry '{{ substr(date('Y-m-d', strtotime($post->created_at)), 2) }} ({{ date('D', strtotime($post->created_at)) }})
            @endif 
        </a>
    </h2>

    <!-- Body -->
    <div class="text-gray-200 post-body">
        {{ substr($post->body, 0, 100) }}{{ strlen($post->body) > 100 ? '...' : '' }}
    </div>

    <!-- Categories -->
    @if ($post->categories)
        <div class="text-sm text-gray-400">
            <span class="font-bold">Categories:</span> {{ $post->categories }}
        </div>
    @endif
    
    <!-- Visibility & Created At -->
    <div class="flex flex-col gap-3 text-[12px] text-gray-400 sm:flex-row sm:justify-between sm:items-center">
        <span><span class="font-bold opacity-50">Visibility:</span> {{ $post->visibility === '0' ? 'Draft' : 'Published' }} </span>
        <span><span class="font-bold opacity-50">Created:</span> <span class="post-created">{{ substr($post->created_at, 0, -3) }}</span></span>
    </div>

</div>