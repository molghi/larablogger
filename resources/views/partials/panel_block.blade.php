{{-- TOP PART --}}
<div class="container mx-auto flex items-center justify-between relative mb-10 mt-8">
    <a class="{{config('tailwind.simple_btn_styles')}} bg-indigo-600" href="/posts" title="Back to posts">Back</a>

    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 text-center mb-6 absolute left-1/2 transform -translate-x-1/2 top-[1px]">
        User Panel
    </h1>
</div>


{{-- MIDDLE PART --}}
<div class="container mx-auto flex items-center justify-between py-4 rounded-lg mb-10">
  
 <span class="text-white text-2xl font-bold">
    User: <span class="text-purple-600" title="{{ $email }}">{{ !empty($name) && $name ? $name : explode('@', $email)[0] }}</span>
</span>

  <div class="flex gap-3">
    <a href="/panel/update/username" class="bg-blue-600 {{config('tailwind.simple_btn_styles')}} opacity-50 hover:opacity-100">
      Change username
    </a>
    <a href="/panel/update/password" class="bg-green-600 {{config('tailwind.simple_btn_styles')}} opacity-50 hover:opacity-100">
      Change password
    </a>
  </div>
</div>


{{-- BOTTOM PART, TABLE --}}
<div class="container mx-auto pb-[100px]">
    <div class="text-2xl font-bold mb-4 text-white">Posts: {{ count($posts) }}</div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-300 bg-gray-900 text-white post-entries rounded-md overflow-hidden">
            <thead class="bg-gray-800 text-[silver] italic">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-semibold">
                        Post Title <span class="text-[10px] italic font-normal align-top text-[#999]">(Hover to see body snippet)</span>
                    </th>
                    <th class="px-4 py-2 text-left text-sm font-semibold">Visibility</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold">Published At</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold">Comments</th>
                    <th class="px-4 py-2 text-center text-sm font-semibold">View</th>
                    <th class="px-4 py-2 text-center text-sm font-semibold">Edit</th>
                    <th class="px-4 py-2 text-center text-sm font-semibold">Delete</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @if (count($posts) > 0)
                    @foreach($posts as $post)
                        <tr class="hover:bg-[MidnightBlue]">
                            <td class="text-sm px-4 py-2 max-w-[390px] overflow-hidden whitespace-nowrap overflow-ellipsis" 
                                title="{{ substr($post->body, 0,50) }}{{ strlen($post->body) > 50 ? '...' : '' }}">{{ $post->title }}
                            </td>

                            <td class="text-sm px-4 py-2 {{ $post->visibility == '1' ? 'text-green-500' : 'text-gray-300' }}">{{ $post->visibility == '0' ? 'Draft' : 'Published' }}</td>

                            <td class="text-sm px-4 py-2">{{ substr($post->created_at, 0, -3) }}</td>

                            <td class="text-sm px-4 py-2">___</td>

                            <td class="text-sm px-4 py-2 text-center">
                                <a href="/posts/{{ $post->id }}" class="underline hover:no-underline hover:opacity-50">View</a>
                            </td>

                            <td class="text-sm px-4 py-2 text-center">
                                <a href="/posts/edit/{{ $post->id }}" class="underline hover:no-underline hover:opacity-50">Edit</a>
                            </td>

                            <td class="text-sm px-4 py-2 text-center">
                                <form action="{{ route('post.delete', $post->id) }}" method="POST">
                                    @csrf 
                                    @method("DELETE")
                                    <button class="underline hover:no-underline hover:text-[red]" onclick="return confirm('Are you sure you want to delete this post?\n\nThis action cannot be undone.')" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else 
                    <tr>
                        <td class="italic px-4 py-2 bg-[#222] text-center" colspan="7">Nothing here yet...</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

 </div>