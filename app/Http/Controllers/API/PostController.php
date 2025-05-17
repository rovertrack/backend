<?php

namespace App\Http\Controllers\API;
use App\Models\Post;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller


{

   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return response()->json(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
            ]);

            // Attempt to create a new post
            $post = Post::create($validated);

            return response()->json($post, 201);
        } catch (Exception $e) {
            // If any error occurs, return a 500 Internal Server Error
            return response()->json([
                'error' => 'Something went wrong, please try again.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($post);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
        ]);
    
        $post->update($validated);
        return response()->json($post);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post->delete();
        return response->json(null,200);
        //
    }
}
