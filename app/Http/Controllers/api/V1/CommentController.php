<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
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
        
        // !!!Demo
        //  $data = Comment::find($commentId);
        //  if(!$data){
        //     return   response()->json(["message" => "Error {$commentId}"], 404);
        //  }

        // return  response()->json([
        //     'message' => "comment id: {$commentId}",
        //     // 'data' => CommentResource::make($data),
        //     'data'=>CommentResource::make($data),
        // ], 200);


        // $data= Comment::find($commentId);
        // $replies= $data->replies;
        
        // return response()->json([
        //     "message"=>"wow {$commentId}",
        //     "data"=> CommentResource::make($data),
        //     "replies"=>CommentResource::collection($replies),   
        // ], 200);


        $all = Comment::with('replies')->get();
        return CommentResource::collection($all);
       
    }
    
    public function index(){
        // return Comment::all();
        return CommentResource::collection(Comment::with('replies')->get());
    }

    
    public function show(Comment $comment){
         return CommentResource::make($comment);
    }
   
    public function store(StoreCommentRequest $request){
        $result = Comment::create($request->validated());
         return CommentResource::make($result);
    }

    public function destroy(Comment $comment){

        $commentName = $comment->name;
       $comment->delete();

       return response()->json([
        "message"=> "{$commentName} Data Deleted"
       ],200);
     
    }

    public function update(UpdateCommentRequest $request, Comment $comment){

        $comment->update($request->validated());

        return CommentResource::make($comment);

    }
}