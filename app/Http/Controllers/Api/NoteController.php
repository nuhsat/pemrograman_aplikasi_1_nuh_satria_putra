<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function createAPI(Request $request) {
        $payload = [
            'title' => $request->title,
            'description' => $request->subtitle
        ];
        $note = Note::create($payload);

        return response()->json([
            "message" => "Berhasil Create Note",
            "result"  => $note
        ], 200);
    }

    public function updateAPI(Request $request, $id) {
        $payload = [];
        if (!empty($request->title)) {
            $payload = array_merge($payload, ['title' => $request->title]);
        }
        if (!empty($request->description)) {
            $payload = array_merge($payload, ['description' => $request->description]);
        }
        $note = Note::Where('id', $id)->update($payload);

        return response()->json([
            "message" => "Berhasil Update Note",
            "result"  => $note
        ], 200);
    }

    public function listAPI(Request $request) {
        $note = Note::all();

        return response()->json([
            "message" => "List Note",
            "result"  => $note
        ], 200);
    }

    
    public function detailAPI(Request $request, $id) {
        $note = Note::where('id', $id)->get();

        if(empty($note)) {
            return response()->json([
                "message" => "Detail Note Not Found",
                "result"  => null
            ], 404);
        };


        return response()->json([
            "message" => "Detail Note",
            "result"  => $note
        ], 200);
    }

    public function deleteAPI(Request $request, $id) {
        Note::where("id", $id)->delete();

        return response()->json([
            "message"=> "Berhasil",
        ], 200);
    }
}
