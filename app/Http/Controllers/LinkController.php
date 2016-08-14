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
}
