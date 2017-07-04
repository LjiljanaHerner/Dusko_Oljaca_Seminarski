<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
	public function getArhiva()
	{
		$posts = Post::paginate(3);
		
		return view('blog.arhiva')->withPosts($posts);
	}
	
    public function getSingle($id)
	{
		//Uzimamo iz baze podataka post na osnovu njegovog id-a
		$post = Post::where('id', '=', $id)->first();
		
		return view('blog.single')->withPost($post);
	}
}
