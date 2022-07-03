<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Session;
class ArticleController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = Article::all();
        return view('article_list', compact('articles'));
    }

    public function show($id)
    {
        return Article::find($id);
    }
    
    public function showMyArticles()
    {
        $articles = Article::where('user_id', auth()->user()->id)->get();
        return view('my_article', compact('articles'));
    }

    public function create()
    {
        $selectedID = null;
        $categories = Category::all();
        return view('forms.cr_article', compact('selectedID', 'categories'));
    }

    public function store(Request $request)
    {
        $data = array_merge($request->all(),['user_id' => auth()->user()->id]);
        $data['image'] = 'https://via.placeholder.com/500x300';
        $data['category_id'] = (int) $data['category_id'];
        Article::create($data);

        return redirect('/articles')->with('status', 'Berhasil menambahkan artikel');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        $selectedID = $article->category_id;
        return view('forms.up_article', compact('article', 'categories', 'selectedID'));
    }
    
    public function update($id, Request $request)
    {
        $article = Article::findOrFail($id);
        $data = array_merge($request->all(), ['user_id' => auth()->user()->id]);
        $data['image'] = 'https://via.placeholder.com/500x300';
        $data['category_id'] = (int) $data['category_id'];
        $article->update($data);
        return redirect('/articles/my_article')->with('status', 'Berhasil mengupdate artikel');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('/articles')->with('status', 'Berhasil menghapus artikel');
    }
}
