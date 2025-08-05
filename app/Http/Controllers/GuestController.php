<?php

namespace App\Http\Controllers;

use App\Imports\GuestsImport;
use App\Models\Guest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $guests = Guest::when($search, function ($query, $search) {
            return $query->where('fullname', 'like', '%' . $search . '%');
        })->paginate(10);

        // dd($guests);

        return view('guest.index', compact('guests'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $guests = Guest::where('fullname', 'like', '%' . $search . '%')
            ->orWhere('address', 'like', '%' . $search . '%')
            ->get();

        return response()->json($guests);
    }

    public function create()
    {
        return view('guest.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'nullable|string|max:15', // Optional phone number validation
        ]);

        try {
            Guest::create([
                'fullname' => $request->fullname,
                'address' => $request->address,
                'phone_number' => $request->phone_number, // Optional phone number
            ]);

            session()->flash('success', 'Guest created successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to create guest. Please try again.');
        }

        return redirect()->route('guest.index');
    }

    public function edit(Guest $guest)
    {
        return view('guest.edit', compact('guest'));
    }

    public function update(Request $request, Guest $guest)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'nullable|string|max:15', // Optional phone number validation
        ]);

        try {
            $guest->update([
                'fullname' => $request->fullname,
                'address' => $request->address,
                'phone_number' => $request->phone_number, // Optional phone number
            ]);

            session()->flash('success', 'Guest updated successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to update guest. Please try again.');
        }
        return redirect()->route('guest.index');
    }

    public function destroy(Guest $guest)
    {
        try {
            $guest->delete();
            session()->flash('success', 'Guest deleted successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to delete guest. Please try again.');
        }
        return redirect()->route('guest.index');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new GuestsImport, $request->file('file'));
            session()->flash('success', 'Guests imported successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to import guests. Please try again.');
        }

        return redirect()->route('guest.index');
    }
}
