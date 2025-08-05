<?php
namespace App\Http\Controllers;

use App\Models\MusicFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MusicFileController extends Controller
{
    public function index()
    {
        $musicFiles = MusicFile::paginate(10); // Paginate results
        return view('music.index', compact('musicFiles'));
    }

    public function create()
    {
        return view('music.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:mp3|max:10240', // Validate mp3 files up to 10MB
        ]);

        // Store file in the public folder
        $file = $request->file('file');
        $path = $file->store('music', 'public'); // Save file in public/music folder

        // Save file information to the database
        $musicFile = new MusicFile();
        $musicFile->filename = $file->getClientOriginalName();
        $musicFile->path = $path; // Store path relative to public folder
        $musicFile->status = true; // Default to active
        $musicFile->save();

        return redirect()->route('music.index')->with('success', 'Music file uploaded successfully.');
    }

    public function toggleStatus($id)
    {
        $musicFile = MusicFile::findOrFail($id);
        $musicFile->status = !$musicFile->status; // Toggle status
        $musicFile->save();

        return redirect()->route('music.index')->with('success', 'Status updated successfully.');
    }

    public function destroy($id)
    {
        $musicFile = MusicFile::findOrFail($id);
        Storage::delete($musicFile->path);
        $musicFile->delete();

        return redirect()->route('music.index')->with('success', 'Music file deleted successfully.');
    }
}
