<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $url = sprintf("<a href=\"/posts/%s\">here</a>", 1);
        session()->flash("message", sprintf("Post Created %s %s", "foo", $url));
        return view('home');
    }
}
