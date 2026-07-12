<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function show(string $id)
    {
        $category = Category::query()
            ->where('id', $id)
            ->first();

        if(!$category){
            return response()->json([
                'message' => 'Not Found'
            ], 404);
        }

        return response()->json($category);
    }
}
