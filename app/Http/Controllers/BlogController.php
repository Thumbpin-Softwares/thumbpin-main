<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
class BlogController extends Controller
{
    public function blogs(){

        $posts = Post::where('status', 'PUBLISHED')
                ->join('users', 'users.id', '=', 'posts.author_id')
                ->join('categories', 'categories.id', '=', 'posts.category_id')
                ->select('posts.*', 'categories.name as category_name', 'categories.slug as category_slug', 'users.name')
                ->latest()->paginate(6);
                $categories = Category::all(); // Get all categories to display in the sidebar
        return view('visitors.blog')->with(['posts' => $posts, 'categories' => $categories]);
    }
    // filter by category
    public function filterByCategory($category_slug)
    {
        $category = Category::where('slug', $category_slug)->firstOrFail();

        $posts = Post::where('status', 'PUBLISHED')
                    ->where('category_id', $category->id)
                    ->join('users', 'users.id', '=', 'posts.author_id')
                    ->join('categories', 'categories.id', '=', 'posts.category_id')
                    ->select('posts.*', 'categories.name as category_name', 'categories.slug as category_slug', 'users.name')
                    ->latest()->paginate(6);

        $categories = Category::all(); // Get all categories to display in the sidebar

        return view('visitors.blog')->with(['posts' => $posts, 'categories' => $categories, 'selectedCategory' => $category]);
    }

    public function blog($slug){
        $post = Post::where(['posts.status' => 'PUBLISHED', 'posts.slug' => $slug])
                    ->join('users', 'users.id', '=', 'posts.author_id')
                    ->join('categories', 'categories.id', '=', 'posts.category_id')
                    ->select('posts.*', 'categories.name as category_name', 'categories.slug as category_slug', 'users.name', 'users.avatar')
                    ->latest()->firstOrFail();

        $related_posts = Post::where('status', 'PUBLISHED')
                ->join('users', 'users.id', '=', 'posts.author_id')
                ->join('categories', 'categories.id', '=', 'posts.category_id')
                ->where('categories.id',$post->category_id)
                ->select('posts.*', 'categories.name as category_name', 'categories.slug as category_slug', 'users.name')
                ->latest()->take(2)->get();

        // $latest_posts = Post::where('status', 'PUBLISHED')
        //         ->join('users', 'users.id', '=', 'posts.author_id')
        //         ->join('categories', 'categories.id', '=', 'posts.category_id')
        //         ->select('posts.*', 'categories.name as category_name', 'categories.slug as category_slug', 'users.name')
        //         ->latest()->take(3)->get();

        $tags = DB::table('post_tags')
                ->where('post_id',$post->id)
                ->join('tags','tags.id','post_tags.tag_id')
                ->select('tags.*','post_tags.tag_id')
                ->orderBy('tags.count','desc')->get();

        // $comments = Comment::where(['post_id' => $post->id, 'status' => 'Active'])->latest()->paginate(10);
        return view('visitors.blog-detail')->with([
            'post' => $post,
            'related_posts' => $related_posts,
            // 'posts' => $latest_posts,
            'tags' => $tags,
        ]);
    }


    public function tagBlogs($slug){
        $posts = DB::table('post_tags')
            ->join('posts','posts.id','post_tags.post_id')
            ->join('tags', 'tags.id','post_tags.tag_id')
            ->where('posts.status','PUBLISHED')
            ->where('tags.tag_slug',$slug)
            ->select('posts.*','tags.tag_name')
            ->paginate(6);

        return view('visitors.blog')->with([
            'posts'=>$posts,
        ]);
    }

}
