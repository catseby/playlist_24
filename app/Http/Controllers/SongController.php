<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Playlist;
use Illuminate\Support\Facades\DB;


class SongController extends Controller
{
    
    public function index()
    {
        $songs = Song::all();
        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'genre' => 'required'
        ]);

        $song = Song::create([
            'title' => $request->input('title'),
            'artist' => $request->input('artist'),
            'genre' => $request->input('genre')
        ]);

        return redirect('/songs')->with('success', 'Song created successfully!');
    }

    public function add(Request $request, $id)
    {
        //$request->validate([
        //    'type' => 'required',
        //]);

        $song = Song::findOrFail($id);
        $playlist = Playlist::findOrFail($request->get('type'));

        DB::insert('insert into playlist_song (playlist_id, song_id) values (?, ?)', [$playlist->id ,$song->id]);

        $playlists = Playlist::all();
        return view('songs.show', ['song' => $song], compact('playlists'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        $playlists = Playlist::all();

        return view('songs.show', ['song' => $song], compact('playlists'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $song = Song::findOrFail($id);
    
        // Pass the playlist to the view
        return view('songs.edit', ['song' => $song]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'genre' => 'required'
        ]);
    
        // Find the playlist and update its attributes
        $song = Song::findOrFail($id);
        $song->update([
            'title' => $request->input('title'),
            'artist' => $request->input('artist'),
            'genre' => $request->input('genre')
        ]);
    
        // Redirect back to the playlists index page
        return redirect()->route('songs.index')->with('success', 'Song updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $song = Song::where('id', $id);

        $song->delete();

        return redirect('/songs')->with('success', 'Song deleted successfully!');
    }
}
