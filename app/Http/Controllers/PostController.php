<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Session;
use App\User;
use Auth;
use Image;
use Storage;

class PostController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** 1. kreirati varijablu i spremiti u nju sve postove iz baze podataka (Post:: - je naš * model) s tim da smo ovdje izvršili paginaciju, tj. ograničili prkaz na 5 postova po *stranici
		*/
		$posts = Post::orderBy('id', 'desc')->paginate(3);
		
		// 2.'return' view i u njega proslijediti spomenutu varijablu
		return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		// 1.validacija
		$this->validate($request, array(
			'naslov' => 'required|string|max:255',
			'body' => 'required',
			'image' => 'sometimes|image'
			));
		
		$user = User::find(Auth::user()->id);
			
		// 2.spremanje u bazu podataka
		$post = new Post;
		
		$post->naslov = $request->naslov;
		$post->body = $request->body;
		
		//povezivanje user_id(Post model) sa modelom User
		$post->user()->associate($user);
		
		//spremanje slika
		if($request->hasFile('image')){
			$image = $request->file('image');
			$filename = time(). '.' .$image->getClientOriginalExtension();
			$location = public_path('images/'.$filename);
			Image::make($image)->resize(800,400)->save($location);
			
			$post->image = $filename;
		}
		
		$post->save();
		
		// 3.Postavljanje 'flash' poruke
		Session::flash('success', 'Post je uspješno kreiran!!!');
		
		// 4.redirekt sa 'flash' porukom
		return redirect()->route('posts.show', $post->id);
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$post = Post::find($id);
        return view('posts.show')->withPost($post); //može i '->with('post', $post);'
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 1.Pronaći u bazi podataka post i spremiti ga u varijablu (Post:: - je naš model)
		$post = Post::find($id);
		
		//2.Provjera da li je user autor posta
		if(Auth::user()->id !== $post->user_id){
            return redirect()->route('posts.index');
        }
		
		// 3.'return view' i u njega proslijediti varijablu prethodno kreiranu varijablu
		return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 1.validacija podataka
		$this->validate($request, array(
			'naslov' => 'required|string|max:255',
			'body' => 'required',
			'image' => 'sometimes|image'
		));
		
		// 2.Spremanje u bazu podataka
		$post = Post::find($id);
		
		// 3.Provjera da li je user autor posta
		if(Auth::user()->id !== $post->user_id){
            return redirect()->route('posts.index');
        }
		
		$post->naslov = $request->input('naslov');
		$post->body = $request->input('body');
		
		if($request->hasFile('image')){
			
			// Dodavanje nove slike
			$image = $request->file('image');
			$filename = time(). '.' .$image->getClientOriginalExtension();
			$location = public_path('images/'.$filename);
			Image::make($image)->resize(800,400)->save($location);
			
			// Hvatanje stare slike
			$oldFilename = $post->image;
			
			// Update baze podataka
			$post->image = $filename;
			
			// Brisanje stare slike
			Storage::delete($oldFilename);
		}
		
		$post->save();
		
		// 4.Postavljanje 'flash' poruke
		Session::flash('success', 'Promjene su uspješno spremljene!!!');
		
		// 5.redirekt sa 'flash' porukom
		return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 1.Pronaći u bazi podataka post i spremiti ga u varijablu (Post:: - je naš model)
		$post = Post::find($id);
		
		// 2.Provjera da li je user autor posta
		if(Auth::user()->id !== $post->user_id){
            return redirect()->route('posts.index');
        }
		
		// 3.Brisanje slike
		Storage::delete($post->image);
		
		// 4.Pomoću ugrađene funkcije u elokventu, brišemo naš post
		$post->delete();
		
		// 5.Postavljanje 'flash' poruke o uspješnosti brisanja
		Session::flash('success', 'Vaš post je uspješno izbrisan!!!');
		
		// 6.redirekt na sve postove sa 'flash' porukom
		return redirect()->route('posts.index');
    }
}
