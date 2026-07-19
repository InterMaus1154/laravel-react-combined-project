<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

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
