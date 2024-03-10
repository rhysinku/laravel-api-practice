<?php

namespace App\Http\Resources;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'parentCommentId'=>$this->parent_comment_id,
            'name' => $this->name,
            'comment' => $this->comment_data,
            'replies' => ReplyResource::collection($this->whenLoaded('replies')),
        ];
        
    }
}