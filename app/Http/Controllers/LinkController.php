<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use Illuminate\Support\Str;

class LinkController extends Controller
{
        // Show form + list
    public function index()
    {
    $links = \App\Models\Link::latest()->take(10)->get();
        return view('welcome', compact('links'));
    }

    // Store new link
    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url'
        ]);

        // Generate a unique short code (retry if collision)
        do {
            $code = Str::random(6);
        } while (\App\Models\Link::where('short_code', $code)->exists());

        $link = \App\Models\Link::create([
            'original_url' => $request->original_url,
            'short_code' => $code,
        ]);
        return redirect()->back()->with('short_url', url($code));
    }

    // Redirect short URL
    public function redirect($code)
    {
    $link = \App\Models\Link::where('short_code', $code)->firstOrFail();
    $link->increment('clicks');
        return redirect()->away($link->original_url);
    }

}
