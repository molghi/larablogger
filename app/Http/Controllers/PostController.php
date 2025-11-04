<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CommentController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    private $posts_per_page = 9;
    
    // ============================================================

    public function index () {
        $data = [
            'title' => 'My Posts', 
            'posts' => Post::where('user_id', Auth::id())->latest()->paginate($this->posts_per_page)
        ];
        return view('posts', $data);
    }

    // ============================================================

    public function store (Request $request) {
        date_default_timezone_set('Etc/GMT-4');

        // get form data, validate
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'body' => 'required|string',
            'categories' => 'nullable|string',
            'cover_image' => 'image|nullable',
            'visibility' => 'required|boolean',
        ]);

        if (empty($data['title'])) {
            $date_now = substr(date('Y-m-d'), 2);
            $weekday_now = date('D');
            $data['title'] = "Journal Entry '" . $date_now . " ($weekday_now)";
        }

        // get user id
        $data['user_id'] = Auth::id();

        // handle img upload
        $path = $request->file('cover_image')->store('images', 'public');
        $data['cover_image'] = $path;

        // push to db
        Post::create($data);

        // redirect to posts
        return redirect('/posts')->with('success', 'Post created!');
    }

    // ============================================================
    
    public function update (Request $request) {
        date_default_timezone_set('Etc/GMT-4');

        // get form data, validate
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'body' => 'required|string',
            'categories' => 'nullable|string',
            'cover_image' => 'image|nullable',
            'visibility' => 'required|boolean',
            'created_at' => 'required|date',
            'id' => 'required|integer'
        ]);

        if (!$data['title']) {
            $date_now = substr(date('Y-m-d', strtotime($data['created_at'])), 2);
            $weekday_now = date('D', strtotime($data['created_at']));
            $data['title'] = "Journal Entry '" . $date_now . " ($weekday_now)";
        }

        if ($request->file('cover_image')) {
            $path = $request->file('cover_image')->store('images', 'public');
            $data['cover_image'] = $path;
        }

        unset($data['created_at']);

        Post::where('user_id', Auth::id())->where('id', $data['id'])->update($data);

        return redirect('/posts')->with('success', 'Post updated!');
    }

    // ============================================================

    public function show_post (Request $request) {
        $post_id = $request['id'];

        $data = [
            'title' => 'Post Page',
            'post' => Post::find($post_id),
            'comments' => CommentController::get_by_post($post_id)
        ];

        return view('post', $data);
    }

    // ============================================================

    public function destroy ($id) {
        Post::where('user_id', Auth::id())->where('id', $id)->delete();
        return redirect('/posts')->with('success', 'Post deleted!');
    }

    // ============================================================
}
