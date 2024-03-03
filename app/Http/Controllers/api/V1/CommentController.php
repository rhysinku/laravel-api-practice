<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //
    public function demo(Comment $comment){
        //   return CommentResource::collection(Comment::all());
        // return CommentResource::make($comment);
        // return CommentResource::make($comment->id);

        $data = Comment::find($comment);
        if (!$data instanceof Comment){
            return "What?";
        }
    }
    
    public function index(){
        // return Comment::all();
        return CommentResource::collection(Comment::all());
    }

    
    public function show(Comment $comment){
         return CommentResource::make($comment);
    }
   
    public function store(StoreCommentRequest $request){
        $result = Comment::create($request->validated());
         return CommentResource::make($result);
    }

    public function destroy(Comment $comment){
        $data = Comment::findOrFail($comment);
        
        // return CommentResource::make($data);
        
    }
}