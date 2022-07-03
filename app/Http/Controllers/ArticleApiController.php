<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Closure;

class ArticleApiController extends Controller
{
    public function __construct()
    {
        // dd(auth()->user());
        // $this->middleware(function(Request $request, Closure $next)
        // {
            // dd(auth()->user());
        //     if ($request->headers->get('Authorization') == null) {
        //         return response()->json(['error' => 'Unauthorized'], 401);
        //     }
        //     return $next($request);
        // });
    }

    public function index()
    {
        $articles = Article::paginate(25); // default 25
        return response()->json($articles);
    }
    
    public function show($id)
    {
        $article = Article::find($id);
        return response()->json($article);
    }
    
    public function create()
    {
        $selectedID = null;
        $categories = Article::all();
        return response()->json($categories);
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        Article::create($data);
        
        return response()->json(['status' => 'Berhasil menambahkan artikel']);
    }
    
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        $selectedID = $article->category_id;
        return response()->json($categories);
    }
    
    public function update($id, Request $request)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return response()->json(['status' => 'Berhasil Update artikel']);
    }
    
    public function destroy($id)
    {
        $article = Article::where('category_id', $id);
        $article->delete();
        return response()->json(['status' => 'Berhasil menghapus artikel']);
    }
}
