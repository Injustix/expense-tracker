<?php

use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Expense Tracker';
});

Route::get('/expenses/create', [ExpenseController::class, 'create']);
Route::get('/expenses', [ExpenseController::class, 'index']);
Route::post('/expenses', [ExpenseController::class, 'store']);
Route::get('/expenses/{id}/edit', [ExpenseController::class, 'edit']);
Route::put('/expenses/{id}', [ExpenseController::class, 'update']);
Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy']);
Route::get('/expenses/{expense}', [ExpenseController::class, 'show']);