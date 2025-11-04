<section class="max-w-2xl mx-auto p-4 pt-0 pb-10 rounded-xl shadow">
  
    <!-- Heading -->
    <h2 class="text-2xl text-center font-semibold mb-8 text-gray-900 dark:text-gray-100">
        Comments ({{ count($comments) }})
    </h2>

        <div class="comments">
            @if (!empty($comments) && $comments && count($comments) > 0)
                @foreach ($comments as $comment)
                    @include('partials.comment_block')
                @endforeach
            @else
                <div class="italic text-[#555]">Comments will be here...</div>        
            @endif
        </div>
  
</section>
