<?php
namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{

    public function store(Request $request)
    {
        $bannedWords = [
            'kontol', 'anjing', 'bangsat', 'babi', 'tai', 'kampret', 'tolol', 'goblok', 'asu',
            'jancuk', 'ngentot', 'memek', 'pepek', 'perek', 'pelacur', 'sundal', 'bajingan', 'brengsek',
            'setan', 'iblis', 'sialan', 'bego', 'goblok', 'pukimak', 'bodoh', 'tolol', 'kampungan', 'kampungan',
            'tidur', 'oyo', 'checkin', 'check out', 'check-in', 'check-out', 'hotel', 'booking', 'reservasi',
            'pesan', 'pesanan', 'kamar', 'room', 'staycation', 'staycationer', 'staycationers', 'ewe', 'ngentot',
            'ngentotin', 'ngentotnya', 'ngentotinya', 'ngentotmu', 'ngentotku', 'ngentotnya', 'ngentotnya', 'ngentotnya',
        ];

        // Custom validator dengan closure untuk cek kata tidak pantas
        $validator = Validator::make($request->all(), [
            'name'                 => 'required|string|max:255',
            'message'              => [
                'required',
                'string',
                'max:1000',
                function ($attribute, $value, $fail) use ($bannedWords) {
                    foreach ($bannedWords as $word) {
                        if (stripos($value, $word) !== false) {
                            return $fail('Ucapan mengandung kata tidak pantas.');
                        }
                    }
                },
            ],
            'konfirmasi_kehadiran' => 'required|string|in:hadir,tidak_hadir', // Validasi konfirmasi_kehadiran
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Simpan ke database
        $message = Message::create([
            'name'                 => $request->name,
            'message'              => $request->message,
            'konfirmasi_kehadiran' => $request->konfirmasi_kehadiran, // Simpan konfirmasi kehadiran
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => [
                'name'                 => $message->name,
                'message'              => $message->message,
                'konfirmasi_kehadiran' => $message->konfirmasi_kehadiran, // Tambahkan konfirmasi kehadiran dalam response
                'created_at'           => $message->created_at->toIso8601String(),
            ],
        ]);
    }

    public function list()
    {
        $messages = Message::latest()->get();

        return response()->json([
            'status'   => 'success',
            'messages' => $messages,
        ]);
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Message deleted successfully.',
        ]);
    }

    public function index()
    {
        $messages = Message::paginate(10); // Paginate results
        return view('messages.index', compact('messages'));
    }

    public function search(Request $request)
    {
        $search   = $request->input('search');
        $messages = Message::where('name', 'like', '%' . $search . '%')
            ->orWhere('message', 'like', '%' . $search . '%')
            ->get();

        return response()->json($messages);
    }

    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id);

        $request->validate([
            'name'    => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        $message->update([
            'name'    => $request->name,
            'message' => $request->message,
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Message updated successfully.',
        ]);
    }

}
