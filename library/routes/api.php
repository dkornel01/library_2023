<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CopyController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Models\Lending;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CopyController;
use App\Http\Controllers\LendingController;

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| Here is where you can register routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the " middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
<<<<<<< HEAD
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//admin férhet hozzá
Route::middleware( ['admin'])->group(function () {
    Route::Resource('/users', UserController::class);
=======

//admin férhet hozzá
Route::middleware( ['admin'])->group(function () {
    Route::apiResource('/api/users', UserController::class);
>>>>>>> 6a9165a445908138911896343ad9dee2860bf814
});

//bejelentkezett felhasználó
Route::middleware('auth.basic')->group(function () {
<<<<<<< HEAD
    Route::post('/lendings',[LendingController::class],'store');
    Route::patch('/reservation/{user_id}/{book_id}/{start}',[ReservationController::class,'update']);
    Route::Resource('/copies', CopyController::class);
    Route::post('/reservations',[ReservationController::class,'store']);
    Route::Resource('/lendings',LendingController::class);
=======
    Route::post('/lendings', [LendingController::class, 'store']);
    Route::get('/reservations/{user_id}/{book_id}/{start}', [ReservationController::class, 'show']);
    Route::patch('/reservations/{user_id}/{book_id}/{start}', [ReservationController::class, 'update']);
    Route::post('/reservations', [ReservationController::class, 'store']);
    Route::apiResource('/copies', CopyController::class);
>>>>>>> 6a9165a445908138911896343ad9dee2860bf814
    //lekérdezések
    //with
    Route::get('/with/book_copy', [BookController::class, 'bookCopy']);
    Route::get('/with/lending_user', [LendingController::class, 'lendingUser']);
    Route::get('/with/lending_user2', [LendingController::class, 'lendingUser2']);
    Route::get('/with/copy_book_lending', [CopyController::class, 'copyBookLending']);
    Route::get('/with/user_l_r', [UserController::class, 'userLR']);
    //egyéb lekérdezések
<<<<<<< HEAD
    Route::get('books_at_users', [LendingController::class, 'bookAtUser']);
    Route::patch('lengthen/{copy_id}/{start}',[LendingController::class,'lenghten']);
    Route::get('more_lendings/{$copy_id}/{$db}', [CopyController::class,'moreLendings']);
});

//bejelentkezés nélkül is hozzáférhet
Route::Resource('/books', BookController::class);
Route::patch('/user_password/{id}', [UserController::class, 'updatePassword']);
Route::delete('/lendings/{user_id}/{copy_id}/{start}', [LendingController::class, 'destroy']);
Route::get('/publicated/{book_id}',[BookController::class,'publicated']);
Route::get('/publicated2/{book_id}',[BookController::class,'publicated2']);

require __DIR__.'/auth.php';
=======
    Route::get('books_at_user', [LendingController::class, 'booksAtUser']);
    //lengthen($copy_id, $start)
    Route::patch('lengthen/{copy_id}/{start}', [LendingController::class, 'lengthen']);
    //moreLendings($copy_id, $db)
    Route::get('more_lendings/{copy_id}/{db}', [CopyController::class, 'moreLendings']);
    Route::get('books_back', [LendingController::class, 'booksBack']);
});

//bejelentkezés nélkül is hozzáférhet
Route::apiResource('/books', BookController::class);
Route::patch('/user_password/{id}', [UserController::class, 'updatePassword']);
Route::delete('/lendings/{user_id}/{copy_id}/{start}', [LendingController::class, 'destroy']);
//lekérdezések
Route::get('/publicated/{book_id}', [BookController::class, 'publicated']);
Route::get('/publicated2/{book_id}', [BookController::class, 'publicated2']);
Route::get('/publicated_count/{book_id}', [BookController::class, 'publicatedCount']);
>>>>>>> 6a9165a445908138911896343ad9dee2860bf814
