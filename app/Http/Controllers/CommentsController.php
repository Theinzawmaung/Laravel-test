<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;
use Illuminate\Support\Facades\Redirect;

class CommentsController extends Controller
{
    public function newComment(Request $request){
        $comment = $request->all();
        comment::create($comment);
        return Redirect()->back()->with('status','Your comment have been created!');
    }
}
