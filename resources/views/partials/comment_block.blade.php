@php
    $is_your_comment = $comment->user_id === Auth::id();
@endphp

<div class="border-b border-gray-200 dark:border-gray-700 pb-4 mb-4 comment" data-comment-id="{{ $comment->id }}">
    <!-- Username -->
    @php
        $user_identifier = explode('@', $comment->email)[0];
        if ($comment->name) $user_identifier = $comment->name;
    @endphp
    <p class="font-medium text-gray-800 dark:text-gray-200 mb-1" data-user-id="{{ $comment->user_id }}">
        <span class="font-bold" title="{{ $comment->email }}">{{ $user_identifier }}</span> said:
    </p>

    <!-- Body -->
    <p class="text-gray-700 dark:text-gray-300 mb-2 italic comment-text">
        <span>{{ $comment->body }}</span>
    </p>

    <!-- Footer -->
    <div class="flex justify-between items-end text-[14px] text-gray-500 dark:text-gray-400">
        <span>
            <span class="font-bold">Date: </span>
            {{ substr($comment->created_at, 0, -3) }}
        </span>

        @if ($is_your_comment || $is_your_post)
            <form action="{{ route('comment.delete', $comment->id) }}" method="POST">
                @csrf 
                @method('DELETE')
                <input type="hidden" name="post_id" value="{{$comment->post_id}}">
                <button title="Delete comment" type="submit" class="{{ config('tailwind.simple_btn_styles') }} bg-red-500 opacity-50 hover:opacity-100 py-1" onclick="return confirm('Are you sure you want to delete this comment?\n\nThis action cannot be undone.')">
                    Delete
                </button>
            </form>
        @endif 
    </div>
</div>