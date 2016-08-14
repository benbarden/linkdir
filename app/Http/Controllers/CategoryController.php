<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    public function show($categoryUrl)
    {
        $bindings = array();

        $category = \App\Category::
            where('status', 2)
            ->where('cache_url', sprintf('%s/', $categoryUrl))
            ->first();

        if (!$category) {
            abort(404);
        }

        $bindings['category'] = $category;

        $bindings['featuredLinks'] = \App\Link::
            where('status', 2)
            ->where('category_id', $category->ID)
            ->where('featured', 1)
            ->orderBy('title')
            ->get();

        $bindings['categoryList'] = \App\Category::
            where('status', 2)
            ->where('parent_id', $category->ID)
            ->whereNotNull('cache_title')
            ->whereNotNull('cache_url')
            ->orderBy('title')
            ->get();

        return view('category.show')->with($bindings);
    }
}
