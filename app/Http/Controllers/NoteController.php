<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\NoteController as ApiNoteController;
use App\Http\Controllers\Controller;
use App\Models\Note;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class NoteController extends Controller
{
    public function index() {
        $notes = Note::all();

        $data = [
            "notes" => $notes
        ];
        return view("note.index", $data);
    }

    public function add(Request $request) {
        if ($request->isMethod('post')) {
            $payload = [
                'title' => $request->title,
                'description' => $request->description,
            ];
            $note = Note::create($payload);

            return response()->json([
                "message"=> "Berhasil",
                "result"=> $note
            ], 200);
        } else {
            $data = [
                "note" => []
            ];
            return view("note.form", $data);
        }
    }

    public function edit(Request $request, $id) {
        if ($request->isMethod('post')) {
            $payload = [];
            if (!empty($request->title)) {
                $payload = array_merge($payload, ['title' => $request->title]);
            }
            if (!empty($request->description)) {
                $payload = array_merge($payload, ['description' => $request->description]);
            }
            $note = Note::where("id", $id)->update($payload);

            return response()->json([
                "message"=> "Berhasil",
                "result"=> $note
            ], 200);
        } else {
            $note = Note::find($id);
            abort_if(empty($note), 404);

            $data = [
                "id" => $id,
                "note" => $note
            ];
            return view("note.form", $data);
        }
    }

    public function delete(Request $request, $id) {
        if ($request->isMethod('post')) {
            Note::where("id", $id)->delete();

            return response()->json([
                "message"=> "Berhasil",
            ], 200);
        }
    }
}
