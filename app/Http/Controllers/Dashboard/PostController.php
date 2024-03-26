<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\postImage;
use App\Models\Tag;
use App\Models\PostTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Morilog\Jalali\Jalalian;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        $user = Auth::user();

        return view('dashboard.post.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5)->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $tags = Tag::all();
        return view('dashboard.post.create')->with('user', $user)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'post' => 'required',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'exists:tag,id'
        ]);

        $post_input = $request->all(['title', 'slug', 'description', 'post', 'main_image']);

        if ($image = $request->file('main_image')) {
//            $destinationPath = 'uploads/post/main_images';
//            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
//            $image->move($destinationPath, $profileImage);
            $filePath = Storage::disk('public')->put('uploads/post/main_images', request()->file('main_image'));

            $post_input['main_image'] = "$filePath";
        }

        $post_input['user_id'] = Auth::user()->getAuthIdentifier();
        $post_input['created_at'] = \Morilog\Jalali\Jalalian::now()->getTimestamp();

        $post = Post::create($post_input);

        $tags = $request->all('tags')['tags'] ?? [];
        $post_tags = [];

        foreach ($tags as $tag_id) {
            $post_tags[] = [
                'tag_id' => $tag_id,
                'post_id' => $post->id,
                'created_at' => \Morilog\Jalali\Jalalian::now()->getTimestamp()
            ];
        }


        if (count($post_tags) > 0)
            PostTag::insert($post_tags); // because of batch insert, must use insert method instead of create

        return redirect()->route('post.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function uploadImage(Request $request)
    {
        $fileName=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('uploads', $fileName, 'public');

        $post_image = [
            'image' => $path,
            'user_id' => Auth::user()->getAuthIdentifier(),
            'created_at' => Jalalian::now()->getTimestamp()
        ];

        $post_image_result = PostImage::create($post_image);

        //var_dump($post_image);

        return response()->json(['location'=>"/storage/$path"]);

        /*$imgpath = request()->file('file')->store('uploads', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);*/
    }
}
