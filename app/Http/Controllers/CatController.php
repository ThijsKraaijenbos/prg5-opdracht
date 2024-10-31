<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\LoginHistory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use function Laravel\Prompts\alert;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = Cat::all()->where('active', true);

        return view('catslist', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loginCount = LoginHistory::all()->where('user_id', auth()->id())->count();
        $tags = Tag::all();
        return view('create', compact('loginCount', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|min:10',
            'image' => 'required|file|max:2048',
            'tags' => 'required',
        ],
            [
                'tags.required' => "Select one or more tag(s)"
            ]
        );

        $cat = new Cat();
        $cat->name = $request->input('name');
        $cat->description = $request->input('description');

        $path = $request->file('image')->getRealPath();
        $image = file_get_contents($path);
        $base64 = base64_encode($image);
        $cat->image = $base64;

        $cat->user_id = auth()->id();
        $cat->active = 1;

        $cat->save();
        foreach ($request->input('tags') as $tag) {
            $cat->tags()->attach($tag);
        }

        return redirect()->route('cats-list.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cat = Cat::findOrFail($id);
//        $tags = $cat->tags;
        return view('show', compact('cat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cat $cat)
    {
        if (strtolower(auth()->user()->role) === "admin" || $cat->user_id === auth()->id()) {
            return view('edit', compact('cat'));
        } else {
            abort(403);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cat $cat)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|min:10',
        ]);

        $cat = Cat::findOrFail($cat->id);

        $cat->name = $request->input('name');
        $cat->description = $request->input('description');

        if (isset($request->image)) {
            $path = $request->file('image')->getRealPath();
            $image = file_get_contents($path);
            $base64 = base64_encode($image);
            $cat->image = $base64;
        }
        $cat->tags =

        $cat->save();
        return redirect()->route('cats-list.index');
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
