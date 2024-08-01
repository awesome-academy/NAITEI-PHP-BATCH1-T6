<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the comments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::with('user', 'product')->get();
        return response()->json($comments);
    }

    /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'comment' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->product_id = $validatedData['product_id'];
        $comment->comment = $validatedData['comment'];
        $comment->save();

        return response()->json($comment, 201);
    }

}
