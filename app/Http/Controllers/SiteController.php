<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        $ip_laravel = $request->ip();

        $ip_do_usuario = '';

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_do_usuario = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip_do_usuario = $_SERVER['REMOTE_ADDR'];
        }

        return view('site.welcome', compact('ip_do_usuario', 'ip_laravel'));
    }
}
