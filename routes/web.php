<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DatasetController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DatasetController::class, 'index']);

Route::get('/dataset',[DatasetController::class, 'index'])->name('dataset.index');



