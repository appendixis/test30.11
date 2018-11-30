<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class PathDecodeController extends Controller
{

    /**
     * @param string $slug
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function decode(string $slug)
    {
        $link = Link::where('slug', '=', $slug)->firstOrFail();

        return redirect($link->url);
    }
}
