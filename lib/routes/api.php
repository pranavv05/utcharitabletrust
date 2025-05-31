<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BloodBankController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookListController;
use App\Http\Controllers\ClassNameController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user()->tokens();
// });


// Route::post('/blood', [BloodBankController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function () {
    // Logout
    Route::post('/logout', [MasterController::class, 'logout']);
});

Route::middleware(['isToken'])->group(function () {

    // Admin Login
    Route::post('/access', [MasterController::class, 'AdminLogin']);

});

Route::middleware(['isAdmin'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [MasterController::class, 'dashboard']);

    // Dashboard
    Route::get('/master', [MasterController::class, 'master']);

    // Contact
    Route::get('/contact', [ContactController::class, 'index']);
    Route::post('/contact', [ContactController::class, 'store']);
    Route::delete('/contact/{id}', [ContactController::class, 'destroy']);

    // Feedback
    Route::get('/feedback', [FeedbackController::class, 'index']);
    Route::post('/feedback', [FeedbackController::class, 'store']);
    Route::delete('/feedback/{id}', [FeedbackController::class, 'destroy']);

    // Member
    Route::get('/member', [MemberController::class, 'index']);
    Route::post('/member', [MemberController::class, 'store']);
    Route::delete('/member/{id}', [MemberController::class, 'destroy']);

    // Customer
    Route::get('/customer', [CustomerController::class, 'index']);
    Route::post('/customer', [CustomerController::class, 'store']);
    Route::put('/customer/{id}', [CustomerController::class, 'update']);
    Route::delete('/customer/{id}', [CustomerController::class, 'destroy']);

    // Book API
    Route::get('/book', [BookListController::class, 'index']);
    Route::get('/books', [BookListController::class, 'getAllBook']);
    Route::get('/book/{id}', [BookListController::class, 'show']);
    Route::post('/book', [BookListController::class, 'store']);
    Route::put('/book/{id}', [BookListController::class, 'update']);
    Route::delete('/book/{id}', [BookListController::class, 'destroy']);

    // ClassName API
    Route::get('/class', [ClassNameController::class, 'index']);
    Route::get('/class/{id}', [ClassNameController::class, 'show']);
    Route::post('/class', [ClassNameController::class, 'store']);
    Route::put('/class/{id}', [ClassNameController::class, 'update']);
    Route::delete('/class/{id}', [ClassNameController::class, 'destroy']);

    // Author API
    Route::get('/author', [AuthorController::class, 'index']);
    Route::get('/author/{id}', [AuthorController::class, 'show']);
    Route::post('/author', [AuthorController::class, 'store']);
    Route::put('/author/{id}', [AuthorController::class, 'update']);
    Route::delete('/author/{id}', [AuthorController::class, 'destroy']);

    // Booking API
    Route::get('/booking', [BookingController::class, 'index']);
    Route::get('/booking/{id}', [BookingController::class, 'show']);
    Route::get('/pdf/{id}', [BookingController::class, 'pdfShow']);
    Route::post('/booking', [BookingController::class, 'store']);
    Route::put('/booking/{id}', [BookingController::class, 'update']);
    Route::delete('/booking/{id}', [BookingController::class, 'destroy']);

});
