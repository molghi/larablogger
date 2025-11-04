<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // ============================================================

    public function store (Request $request) {
        date_default_timezone_set('Etc/GMT-4');

        $data = $request->validate([
            'body' => 'required|string|max:10000',
            'post_id' => 'required|numeric'
        ]);
        $data['user_id'] = Auth::id();

        Comment::create($data);

        $post_id = $data['post_id'];

        return redirect("/posts/$post_id")->with('success', 'Comment created!');
    }

    // ============================================================

    static public function get_by_post ($post_id) {
        return Comment::where('post_id', $post_id)
                    ->join('users', 'comments.user_id', '=', 'users.id')
                    ->select('comments.*', 'users.name', 'users.email')
                    ->get();
    }

    // ============================================================

    public function destroy (Request $request) {
        Comment::where('user_id', Auth::id())->where('id', $request['id'])->delete();
        $post_id = $request['post_id'];
        return redirect("/posts/$post_id")->with('success', 'Comment deleted!');
    }

}
