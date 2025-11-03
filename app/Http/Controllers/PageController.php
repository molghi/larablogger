<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Dotenv\Parser\Entry;
use Illuminate\Http\Request;

class PageController extends Controller
{

    // ============================================================

    function show_login_form () {
        return view('login');
    }

    // ============================================================

    function show_signup_form () {
        return view('signup');
    }

    // ============================================================

    function show_posts () {
        return view('posts');
    }

    // ============================================================

    function show_add_form () {
        $data = [
            'mode' => 'add'
        ];
        return view('form', $data);
    }

    // ============================================================

    function show_edit_form (Request $request) {
        $data = [
            'mode' => 'edit',
            'entry' => Post::find($request['id'])
        ];
        return view('form', $data);
    }

}
