<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Request $request)
    {

        $post = Post::filteredProducts($request->category_id);
        return PostResource::collection($post);
    }


    public function show(Post $post){
        if($post){
            return response()->json([
                'status'=>200,
                'data'=>new PostResource($post)
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Post not found',
                'data'=>[],
            ]);
        }
    }


    public function store(PostRequest $request)
    {
        $post = Post::create($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'post created successfully',
            'data' => new PostResource($post)

        ]);
    }



    public function update(PostRequest $request, Post $post)
    {
        if($post){
            $post->update($request->validated());
            return response()->json([
                'status' => 200,
                'message' => 'post updated successfully',
                'data' => new PostResource($post)

            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'post not found',
                'data' => []

            ]);
        }

    }


    public function destroy(Post $post)
    {
        if($post){
            $post->delete();
            return response()->noContent();
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Post not found',
                'data'=>[]
            ]);
        }
    }
}
