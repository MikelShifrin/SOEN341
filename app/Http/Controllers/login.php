<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class login extends Controller
{
    
     public function submit(Store $session, Request $request)
    {

        $login = new Post();
        $login->editPost($session, $request->input('id'), $request->input('title'), $request->input('content'));
        return redirect()->route('admin.index')->with('info', 'Post edited, new Title is: ' . $request->input('title'));
    }
}
