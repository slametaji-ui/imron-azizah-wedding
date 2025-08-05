<?php
namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::paginate(10);
        return view('gallery.index', compact('galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image',
            'alt_text' => 'nullable|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('galleries', 'public');

        Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
            'alt_text' => $request->alt_text,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Photo added successfully.');
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'alt_text' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($gallery->image_path);
            $imagePath = $request->file('image')->store('galleries', 'public');
            $gallery->update(['image_path' => $imagePath]);
        }

        $gallery->update([
            'title' => $request->title,
            'description' => $request->description,
            'alt_text' => $request->alt_text,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Photo updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image_path);
        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Photo deleted successfully.');
    }
}
