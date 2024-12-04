<?php

use App\Http\Controllers\Api\NoteController;
use Illuminate\Support\Facades\Route;

Route::prefix("note")->group(function() {
    Route::get('', [NoteController::class, 'listAPI'])->name("api.note.list");
    Route::post('', [NoteController::class, 'createAPI'])->name("api.note.create");
    Route::get('/{id}', [NoteController::class, 'detailAPI'])->name("api.note.detail");
    Route::put('/{id}', [NoteController::class, 'updateAPI'])->name("api.note.update");
    Route::delete('/{id}', [NoteController::class, 'deleteAPI'])->name("api.note.delete");
});

