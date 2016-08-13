<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    public function show()
    {
        $categoryList = \App\Category::
            where('status', 2)
            ->where('parent_id', 0)
            ->whereNotNull('cache_title')
            ->whereNotNull('cache_url')
            ->orderBy('title')
            ->get();

        return view('home')->with('categoryList', $categoryList);
    }
}
