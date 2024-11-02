<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $recentCat = Cat::query()->latest('created_at')->where('active', true)->first();
        return view('home', compact('recentCat'));
    }
}
