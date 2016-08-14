<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LinkController extends Controller
{
    public function show($linkTitle, $linkId)
    {
        $bindings = array();

        $link = \App\Link::
            where('status', 2)
            ->where('ID', $linkId)
            ->first();

        if (!$link) {
            abort(404);
        }

        $detailsUrl = $link->getOptimisedLinkTitle();
        if ($detailsUrl != $linkTitle) {
            abort(404);
        }

        $bindings['link'] = $link;

        return view('link.show')->with($bindings);
    }

    public function staffList($categoryId)
    {
        $bindings = array();

        $bindings['category'] = \App\Category::where('ID', $categoryId)->first();
        $bindings['linkList'] = \App\Link::
            where('status', 2)
            ->where('category_id', $categoryId)
            ->orderBy('title')
            ->get();

        return view('staff.link.list')->with($bindings);
    }

    public function staffDetails($linkId)
    {
        $bindings = array();

        $link = \App\Link::
            where('ID', $linkId)
            ->first();

        if (!$link) {
            abort(404);
        }

        $linkDetails = array();

        foreach ($link['attributes'] as $key => $value) {
            $linkDetails[$key] = $value;
        }

        $bindings['linkDetails'] = $linkDetails;

        return view('staff.link.details')->with($bindings);
    }
}
