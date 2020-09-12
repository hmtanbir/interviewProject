<?php

namespace App\Http\Controllers\Api\v1;

use Auth;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
// resources
use App\Http\Resources\Post\PostResource;
use App\Http\Resources\Post\PostCollection;


class PostController extends Controller
{

    public function index()
    {
        return new PostCollection(Post::paginate(10));
    }


    public function store(PostRequest $request)
    {
        $post = new Post([
            'title' => $request->get('title'),
            'content' => $request->get('content')
        ]);

        $post->save();

        return response([
            'data' => new PostResource($post)
        ], Response::HTTP_CREATED);
    }


    public function show(Post $post)
    {
        return new PostResource($post);
    }


    public function update(Request $request, Post $post)
    {
        $this->isUserPost($post);
        $post->update($request->all());
        return response([
            'data' => new PostResource($post)
        ], Response::HTTP_CREATED);
    }

    public function destroy(Post $post)    {

        $post->delete();
        return response([
            null
        ], Response::HTTP_NO_CONTENT);
    }
}
