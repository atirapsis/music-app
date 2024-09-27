<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use App\Models\Genre;
use App\Http\Requests\MusicRequest;
use Illuminate\Support\Facades\Auth;
use Storage;
use File;

class MusicController extends Controller
{
    public function create() {
        $genres = Genre::all();
        return view('music.create', compact('genres'));
    }


    public function store(MusicRequest $request){
        if($request->hasFile('image')){
            //rename file
            $fileName = $request->title.'-'.$request->image->getClientOriginalExtension();
            //simpan gambar dlm file
            Storage::disk('public')->put('/image/'.$fileName, File::get($request->image));
        }
        Music::create([
            'user_id' =>auth()->user()->id,
            'title' => $request->title,
            'artist' => $request->artist,
            'genre_id' => $request->genre_id,
            'release_date' => $request->release_date,
            'image' =>$fileName ?? 'No attachment'
        ]);

        return redirect()->route('home');
    }
    public function edit(Music $music) {
        $this->authorize('edit', $music);
        $genres = Genre::all();
        return view('music.update', compact('music', 'genres'));
    }


    public function update(MusicRequest $request, Music $music)
    {
        if ($request->hasFile('image')){
            //rename file
            $fileName = $request->title.'-'.$request->image->getClientOriginalExtension();
            //simpan gambar dlm file
            Storage::disk('public')->put('/image/'.$fileName, File::get($request->image));
        } else {
            $fileName = $music->image;
        }
        $music->update([
            'user_id'=>auth()->user()->id,
            'title' => $request->title,
            'artist' => $request->artist,
            'genre_id' => $request->genre_id,
            'release_date' => $request->release_date,
            'image' =>$fileName,
        ]);

        return redirect()->route('home');
    }
    public function destroy(Music $music)
    {
        $this->authorize('delete', $music);
        $music->delete();
        return redirect()->route('home');
    }
    public function show(Music $music){
        return view('music.show', compact('music'));
    }
}
