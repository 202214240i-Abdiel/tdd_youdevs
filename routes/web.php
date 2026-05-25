<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');

// Ruta usada en el test del video para el DELETE.
Route::delete('/event/{event}', [EventController::class, 'destroy'])->name('events.destroy');
// Ruta plural alternativa para mantener consistencia REST.
Route::delete('/events/{event}', [EventController::class, 'destroy']);
