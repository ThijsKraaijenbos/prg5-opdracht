<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // localhost/cats
    {
        $cats = Cat::all();
        return view('catslist', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() // products/create
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // products
    {
        $cat = new Cat();
        $cat->name = $request->input('name');
        $cat->description = $request->input('description');

        $path = $request->file('image')->getRealPath();
        $image = file_get_contents($path);
        $base64 = base64_encode($image);
        $cat->image = $base64;

        $cat->user_id = auth()->user()->id;
        $cat->active = 1;

        $request->validate([
            'name' => 'required',
            'description' => 'required|min:10',
            'image' => 'required|file|max:2048',
//            'user_id' => 'required',
//            'active' => 'required',
        ]);

        $cat->save();

        return redirect()->route('cats-list.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cat = Cat::findOrFail($id);
        return view('show', compact('cat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cat $cat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cat $cat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cat $cat)
    {
        $cat->delete();
        return redirect()->route('cats-list.index');
    }
}
