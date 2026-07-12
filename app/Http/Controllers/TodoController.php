<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $todos = $request
            ->user()
            ->todos()
            ->with('category')
            ->paginate(15)
            ->through(fn(Todo $todo) => $this->mapWithCategory($todo));

        return response()->json($todos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $todo = $request
            ->user()
            ->todos()
            ->with('category')
            ->where('id', $id)
            ->first();

        if(!$todo){
            return response()->json([
                'message' =>  'Not found'
            ], 404);
        }

        return response()->json($this->mapWithCategory($todo));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'sometimes|string|min:3|max:50',
            'description' => 'sometimes|nullable|max:300|string',
        ]);

        $todo = $request
            ->user()
            ->todos()
            ->where('id', $id)
            ->first();

        if(!$todo){
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }
        $todo->update($data);
        return response()->json($this->mapWithCategory($todo));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $todo = $request
            ->user()
            ->todos()
            ->where('id', $id)
            ->first();
        if(!$todo){
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }

        $todo->delete();
        return response()->noContent();
    }

    public function restore(Request $request, string $id)
    {
        $todo = $request
            ->user()
            ->todos()
            ->withTrashed()
            ->where('id', $id)
            ->first();

        if(!$todo){
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }

        $todo->restore();
        return response()->json($this->mapWithCategory($todo));
    }

    public function toggle(Request $request, string $id)
    {
        $todo = $request
            ->user()
            ->todos()
            ->where('id', $id)
            ->first();

        if(!$todo){
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }

        if($todo->is_checked){
            $todo->uncheck();
        }else{
            $todo->check();
        }

        $todo->save();

        return response()->json($this->mapWithCategory($todo));
    }

    private function mapWithCategory(Todo $todo)
    {
        if(!$todo->relationLoaded('category')){
            $todo->with('category');
        }

        return [...$todo->toArray(), 'category' => $todo->category?->name];
    }
}
