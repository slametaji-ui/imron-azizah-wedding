<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Gallery;
use App\Models\MusicFile;
use Illuminate\Http\Request;
use App\Models\SettingInvitation;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('to', '');
        $search = filter_var($search, FILTER_SANITIZE_STRING);
        $guest = Guest::where('fullname', $search)->first();


        if ($guest) {
            $invitation = SettingInvitation::first();
            $galleries = Gallery::all();
            $music = MusicFile::where('status',1)->get()->first();

            $compact = [
                'guest' => $guest->fullname,
                'invitation' => $invitation,
                'galleries' => $galleries,
                'music' => $music,
            ];
            return view('welcome', $compact);
        } else {
            return abort(404, 'Guest not found');
        }
    }

}
