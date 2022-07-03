<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        return view('category_list', compact('categories'));
    }

    public function show($id)
    {
        return Category::find($id);
    }

    public function create()
    {
        return view('forms.cr_category');
    }

    public function store(Request $request)
    {
        $data = array_merge($request->all(), ['user_id' => auth()->user()->id]);
        Category::create($data);
        return redirect('/categories')->with('status', 'Berhasil menambahkan kategori');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('forms.up_category', compact('category'));
    }

    public function update($id, Request $request)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect('/categories')->with('status', 'Berhasil Update kategori');
    }

    public function destroy($id)
    {
        $article = Article::where('category_id', $id);
        $category = Category::findOrFail($id);
        $article->delete();
        $category->delete();
        return redirect('/categories')->with('status', 'Berhasil menghapus kategori');
    }
}
