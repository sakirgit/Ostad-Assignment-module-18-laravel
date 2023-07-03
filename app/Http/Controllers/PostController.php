<?php

namespace App\Http\Controllers;

use Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
		$posts = Post::with('category')->get();

		return view('posts.index', compact('posts'));
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
    }



    public function categoryPosts($id)
    {
        $category = Category::findOrFail($id);
        $posts = $category->posts;
    
        return view('posts.category_posts', compact('category', 'posts'));
    }

    public function latestPosts()
    {
        $categories = Category::with('latestPost')->get();
    
        return view('categories.latest_posts', compact('categories'));
    }



    public function ass_mod17_q2()
    {
        $posts = DB::table('posts')
                    ->select('excerpt', 'description')
                    ->get();

        print_r($posts);
    }
    
    public function ass_mod17_q4()
    {
        $posts = DB::table('posts')
        ->where('id', 2)
        ->first();

        if ($posts) {
            echo $posts->description;
        } else {
            echo "No post found.";
        }
    }
    
    public function ass_mod17_q5()
    {
        $posts = DB::table('posts')
        ->where('id', 2)
        ->select('description')
        ->first();
        
        dd($posts);
    }
    
    public function ass_mod17_q7()
    {
        $posts = DB::table('posts')
        ->select('title')
        ->get();

        foreach ($posts as $post) {
            echo $post->title . PHP_EOL;
        }
    }
    
    public function ass_mod17_q8()
    {
        $result = DB::table('posts')->insert([
            'title' => 'X',
            'slug' => 'X',
            'excerpt' => 'excerpt',
            'description' => 'description',
            'is_published' => true,
            'min_to_read' => 2
        ]);
        
        print_r($result);
    }
    
    
    public function ass_mod17_q9()
    {
        $affectedRows = DB::table('posts')
        ->where('id', 2)
        ->update([
            'excerpt' => 'Laravel 10',
            'description' => 'Laravel 10'
        ]);

        echo "Number of affected rows: " . $affectedRows;
    }
    
    public function ass_mod17_q10()
    {
        $affectedRows = DB::table('posts')
        ->where('id', 3)
        ->delete();

        echo "Number of affected rows: " . $affectedRows;
    }
    
    
    public function ass_mod17_q14()
    {
        $posts = DB::table('posts')
        ->whereBetween('min_to_read', [1, 5])
        ->get();

        print_r($posts);
    }
    
    
    public function ass_mod17_q15()
    {
        $affectedRows = DB::table('posts')
        ->where('id', 3)
        ->increment('min_to_read', 1);

        echo "Number of affected rows: " . $affectedRows;
    }
    
	 
	 
	 
	 
	 
	 
	 
	 
	 
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validation and storage logic here
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // Validation and update logic here
    }

    public function destroy($id)
    {
        // Deletion logic here
    }
}
