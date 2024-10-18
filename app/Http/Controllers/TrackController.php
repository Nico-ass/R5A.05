<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class TrackController extends Controller
{
    public function show(): View
    {
        return view('app.tracks.create');
    }

    /**
     * Store a newly created track in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'artist_name' => 'required|string|max:255',
            'listen_link' => 'required|url',
            'cover_image' => 'https://www.youtube.com/watch?v=4NRXx6U8ABQ',
            //'week_id' => 'required|exists:weeks,id',
        ]);

        Track::create($validated);

        return redirect()->route('tracks.index')->with('success', 'Track créé avec succès !');
    }
}
