<?php

namespace App\Http\Controllers;

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
}
