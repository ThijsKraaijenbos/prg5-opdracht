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
        $tags = Tag::all();
        return view('catslist', compact('cats', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()) {
            $loginCount = LoginHistory::all()->where('user_id', auth()->id())->count();
            $tags = Tag::all();
            return view('create', compact('loginCount', 'tags'));
        } else {
            return redirect('login')->with('msg', 'You are not allowed to access the Create page as a guest. Please make an account!');
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'description' => 'required|min:10',
                'image' => 'required|file|max:2048|mimes:png,gif,jpeg,jpg',
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

        if (strtolower(auth()->user()->role) === "admin") {
            $cat->active = 1;
        } else {
            $cat->active = 0;
        }

        $cat->save();
        foreach ($request->input('tags') as $tag) {
            $cat->tags()->attach($tag);
        }

        if (auth()->user()->role === "admin") {
            return redirect()->route('cats-list.index')->with('success', 'Your cat has been submitted. Because you\'re an admin it has been automatically verified!');
        } else {
            return redirect()->route('cats-list.index')->with('success', 'Your cat has been submitted. Please wait for an admin to verify it!');
        }
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
        $tags = Tag::all();
        if ($cat->user_id === auth()->id() || isset(auth()->user()->role) && auth()->user()->role === "admin") {
            return view('edit', compact('cat', 'tags'));
        } else {
            return redirect('login')->with('msg', 'You are not allowed to access the Edit page for this specific cat. This may be because you\'re not logged in, or don\'t have the right permissions.');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cat $cat)
    {
        $request->validate(
            [
                'name' => 'required',
                'description' => 'required|min:10',
                'tags' => 'required',
            ],
            [
                'tags.required' => "Select one or more tag(s)"
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
        $cat->save();

        $cat->tags()->detach();
        foreach ($request->input('tags') as $tag) {
            $cat->tags()->attach($tag);
        }

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

    /**
     * Search & filter functionalities
     */
    public function search(Request $request)
    {
        $tags = Tag::all();
        $query = Cat::query()->where('active', true);

        $search = $request->input('input');
        $selectedTags = $request->input('tags', []);

        if (isset($search) && $search != null) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        if (isset($selectedTags) && $selectedTags != null) {
            $query->whereHas('tags', function ($query) use ($selectedTags) {
                $query->whereIn('tag_id', $selectedTags);
            });
        }

        $cats = $query->get();

        return view('catslist', compact('cats', 'tags'));
    }
}
