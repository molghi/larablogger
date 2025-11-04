<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Dotenv\Parser\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    // ============================================================

    public function show_login_form () {
        return view('login');
    }

    // ============================================================

    public function show_signup_form () {
        return view('signup');
    }

    // ============================================================

    public function show_posts () {
        return view('posts');
    }

    // ============================================================

    public function show_add_form () {
        $data = [
            'mode' => 'add'
        ];
        return view('form', $data);
    }

    // ============================================================

    public function show_edit_form (Request $request) {
        $data = [
            'mode' => 'edit',
            'entry' => Post::find($request['id'])
        ];
        return view('form', $data);
    }

    // ============================================================

    public function show_panel () {
        $data = [
            'name' => User::value('name'),
            'email' => User::value('email'),
            'posts' => Post::where('user_id', Auth::id())->get(),
            'title' => 'User Panel'
        ];
        return view('panel', $data);
    }

    // ============================================================

    public function show_update_form (Request $request) {
        $q = $request['flag'];
        $upper = ucwords($q);
        $data = [
            'update_what' => $q,
            'title' => "Update $upper",
            'name' => User::value('name'),
            'email' => User::value('email'),
        ];
        return view('update_form', $data);
    }

    // ============================================================

    public function update_user (Request $request) {
        $update_what = $request['flag'];

        if ($update_what === 'username') {
            $data = $request->validate([
                'username' => 'required|string|max:25|min:3'
            ]);
            User::where('id', Auth::id())->update(['name' => $data['username']]);
        } 
        
        else {
            $data = $request->validate([
                'password' => 'required|confirmed',
            ]);
            User::where('id', Auth::id())->update(['password' => bcrypt($data['password'])]);
        }

        return redirect('/panel')->with('success', 'User data updated!');
    }

    // ============================================================

    public function change_view (Request $request) {
        $new_view = $request['new_view'];
        session(['view' => $new_view]);
        return back()->with('success', 'View changed!');
    }

    // ============================================================
}
