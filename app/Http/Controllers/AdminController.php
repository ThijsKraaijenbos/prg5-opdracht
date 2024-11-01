<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $cats = Cat::all();
        return view('admin.index', compact('cats'));
    }

    public function update(string $id)
    {
        $cat = Cat::find($id);

        $cat->active = !$cat->active;

        $cat->save();

        return redirect()->route('admin.index');
    }
}
