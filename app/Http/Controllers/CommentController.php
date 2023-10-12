<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function commentStore(Request $request){
        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
            'text' => $request->comment
        ]);

        return redirect()->back();
    }
    public function replyStore(Request $request){
        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
            'comment_id' => $request->comment_id,
            'text' => $request->reply,
        ]);

        return redirect()->back();
    }
}
