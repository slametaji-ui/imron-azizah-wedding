<?php

namespace App\Http\Controllers;

use App\Models\SettingInvitation;
use Illuminate\Http\Request;

class SettingInvitationController extends Controller
{
    /**
     * Display the specified resource or create a new one if it doesn't exist.
     */
    public function index()
    {
        $invitation = SettingInvitation::first();
        return view('setting-invitation.index', compact('invitation'));
    }

    /**
     * Store or Update the specified resource in storage.
     */
    public function storeOrUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'invitation_name' => 'required|string|max:255',
            'bride_fullname' => 'required|string|max:255',
            'groom_fullname' => 'required|string|max:255',
            'bride_nickname' => 'required|string|max:100',
            'groom_nickname' => 'required|string|max:100',
            'bride_instagram' => 'nullable|string|max:100',
            'groom_instagram' => 'nullable|string|max:100',
            'bride_father_name' => 'required|string|max:255',
            'bride_mother_name' => 'required|string|max:255',
            'groom_father_name' => 'required|string|max:255',
            'groom_mother_name' => 'required|string|max:255',
            'bride_child_number' => 'required|integer',
            'groom_child_number' => 'required|integer',
            'quotes_source' => 'nullable|string|max:255',
            'quotes_content' => 'nullable|string',
            'akad_day' => 'required|string|max:50',
            'akad_date' => 'required|date',
            'akad_clock' => 'required|string|max:50',
            'akad_venue' => 'required|string|max:255',
            'akad_address' => 'required|string',
            'akad_maps' => 'nullable|string|max:255',
            'resepsi_day' => 'required|string|max:50',
            'resepsi_date' => 'required|date',
            'resepsi_clock' => 'required|string|max:50',
            'resepsi_venue' => 'required|string|max:255',
            'resepsi_address' => 'required|string',
            'resepsi_maps' => 'nullable|string|max:255',
            'maps_iframe' => 'nullable|string',
        ]);

        try {
            // Check if a record already exists
            $invitation = SettingInvitation::first();

            if ($invitation) {
                // Update existing record
                $invitation->update($validatedData);
                session()->flash('success', 'Data updated successfully.');
            } else {
                // Create new record
                SettingInvitation::create($validatedData);
                session()->flash('success', 'Data created successfully.');
            }

            return redirect()->back();

        } catch (\Exception $e) {
            // If there's an error, catch the exception and flash an error message
            session()->flash('error', 'Failed to save data. Please try again.');
            return redirect()->back()->withInput();
        }
    }
}
