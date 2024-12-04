<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('note');
});

Route::get('/register', [AuthController::class, 'register'])->name("register");
Route::post('/register', [AuthController::class, 'register'])->name("actionregister");
Route::get('/login', [AuthController::class, 'login'])->name("login");
Route::post('/login', [AuthController::class, 'login'])->name("actionlogin");


Route::prefix("note")->group(function() {
    Route::get('', [NoteController::class, 'index'])->name("note.list");

    Route::get('/add', [NoteController::class, 'add'])->name("note.add");
    Route::post('/add', [NoteController::class, 'add'])->name("note.add.post");
    Route::get('/edit/{id}', [NoteController::class, 'edit'])->name("note.edit");
    Route::post('/edit/{id}', [NoteController::class, 'edit'])->name("note.edit.post");
    Route::post('/delete/{id}', [NoteController::class, 'delete'])->name("note.delete");
});
