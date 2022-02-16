<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        $post_created = $request->all();

        if (array_key_exists('image', $post_created)) {

            $post_created['image_original_name'] = $request->file('image')->getClientOriginalName();
            $img_path = Storage::put('uploads', $post_created['image']);
            $post_created['image'] = $img_path;
        }

        $new_post = new Post();
        $new_post->fill($post_created);
        $new_post->slug = Post::gerateSlug($new_post->title);

        $new_post->save();

        if (array_key_exists('tags', $post_created)) {
            $new_post->tags()->attach($post_created['tags']);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, Post $post)
    {
        $post_edited = $request->all();

        if (array_key_exists('image', $post_edited)) {
            if ($post->image) {
                Storage::delete($post->image);
            }
            $post_edited['image_original_name'] = $request->file('image')->getClientOriginalName();
            $img_path = Storage::put('uploads', $post_edited['image']);
            $post_edited['image'] = $img_path;
        }

        $post->slug = Post::gerateSlug($post_edited['title']);
        $post->update($post_edited);

        if (array_key_exists('tags', $post_edited)) {
            $post->tags()->sync($post_edited['tags']);
        } else {
            $post->tags()->detach();
        }

        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        if ($post->image) {
            Storage::delete($post->image);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with("deleted", "Il post '$post->title' è stato eliminato correttamente");
    }
}
