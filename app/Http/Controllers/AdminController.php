<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->user() !== null && strtolower(auth()->user()->role) === "admin") {
            $cats = Cat::all();
            return view('admin.index', compact('cats'));
        } else {
            abort(403);
        }
    }

    public function update(string $id)
    {
        $cat = Cat::find($id);

        $cat->active = !$cat->active;

        // Save the updated model
        $cat->save();

        // Redirect back to the admin page with a success message
        return redirect()->route('admin.index')->with('success', 'Cat status updated successfully.');
    }
}
