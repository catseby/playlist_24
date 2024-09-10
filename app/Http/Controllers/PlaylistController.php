<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playlists = Playlist::all();
        return view('playlists.index', compact('playlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('playlists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tag' => 'required'
        ]);

        Playlist::create([
            'name' => $request->input('name'),
            'tag' => $request->input('tag')
        ]);

        return redirect('/playlists')->with('success', 'Playlist created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Playlist $playlist)
    {
        return view('playlists.show', ['playlist' => $playlist]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    // Retrieve the playlist by its ID
    $playlist = Playlist::findOrFail($id);
    
    // Pass the playlist to the view
    return view('playlists.edit', ['playlist' => $playlist]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'name' => 'required',
        'tag' => 'required'
    ]);

    // Find the playlist and update its attributes
    $playlist = Playlist::findOrFail($id);
    $playlist->update([
        'name' => $request->input('name'),
        'tag' => $request->input('tag'),
    ]);

    // Redirect back to the playlists index page
    return redirect()->route('playlists.index')->with('success', 'Playlist updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $playlist = Playlist::where('id', $id);

        $playlist->delete();

        return redirect('/playlists')->with('success', 'Playlist deleted successfully!');
    }
}