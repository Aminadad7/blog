<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Comment::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = $request->input('user_id');
        $comment->post_id = $request->input('post_id');
        $comment->save();
        return response()->json($comment, 201); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        if (!$comment) {
            return response()->json(["message" => "Comment not found"], 404);
        }
        return $comment;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json(["message"=>"Comment erased"], 200);
    }
}
