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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // products
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cat = Cat::findOrFail($id);
        return view('show', [
            'cat' => $cat,
        ]);
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
        //
    }
}
