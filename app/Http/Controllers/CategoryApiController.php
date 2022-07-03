<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class CategoryApiController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
    
    public function show($id)
    {
        $category = Category::find($id);
        return response()->json($category);
    }
    
    public function create()
    {
        $selectedID = null;
        $categories = Category::all();
        return response()->json($categories);
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        // $data['image'] = 'https://via.placeholder.com/500x300';
        // $data['category_id'] = (int) $data['category_id'];
        Category::create($data);
        
        return response()->json(['status' => 'Berhasil menambahkan kategori']);
    }
    
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();
        $selectedID = $category->category_id;
        return response()->json($categories);
    }
    
    public function update($id, Request $request)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return response()->json(['status' => 'Berhasil Update kategori']);
    }
    
    public function destroy($id)
    {
        $category = Category::where('category_id', $id);
        $category->delete();
        return response()->json(['status' => 'Berhasil menghapus kategori']);
    }
}
