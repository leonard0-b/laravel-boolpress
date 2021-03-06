<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
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

        return view ('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'exists:categories,id|nullable',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'cover' => 'nullable|image|max:512|',
            'tag_ids.*' => 'exists:tags,id'
        ]);

       $data = $request->all();
              
       $post_obj = new Post();
       $post_obj->fill($data);

       if (array_key_exists('cover', $data)) {
        $cover = Storage::put('uploads', $data['cover']);
        $post_obj->img = $cover;
       }

       $post_obj->slug = $this->generateSlug($post_obj->title);
       $post_obj->save();

       if (array_key_exists('tag_ids', $data)) {
           $post_obj->tags()->attach($data['tag_ids']);
       }

       Mail::to('mail@mail.it')->send(new SendNewMail());

       return redirect()->route('admin.posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
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
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category_id' => 'exists:categories,id|nullable',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'img' => 'image|max:500|nullable',
            'tag_ids.*' => 'exists:tags,id'
        ]);

        $data = $request->all();

        $data['slug'] = $this->generateSlug($data['title'], $post->title != $data['title'], $post->slug);
        if (array_key_exists('img', $data)) {
            $img = Storage::put('uploads', $data['img']);
            $data['img'] = $img;    
        }
        
        $post->update($data);
        if (array_key_exists('tag_ids', $data)) {
            $post->tags()->sync($data['tag_ids']);
        } else {
            $post->tags()->detach();
        }

 
        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }

    private function generateSlug(string $title, bool $change = true, string $old_slug = '')
    {

        if(!$change) {
            return $old_slug;
        }

        $slug = Str::slug($title, '-');
        $slug_base = $slug;
        $contatore = 1;
        $post_with_slug = Post::where('slug', '=', $slug)->first();
        while ($post_with_slug) {
            $slug = $slug_base . '-' . $contatore;
            $contatore++;
 
            $post_with_slug = Post::where('slug', '=', $slug)->first();
        }

        return $slug;
    }
}
