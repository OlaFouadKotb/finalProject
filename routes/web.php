<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Categories;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Beverages;
use App\Models\Beverage;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\HomeController;




//Front Pages routes using A Controller :
Route::get('mySite', [HomeController::class, 'index'])->name('mySite');
Route::get('drinks', [HomeController::class, 'drink'])->name('drinks');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('special', [HomeController::class, 'special'])->name('special');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');

###################################################################################
Route::middleware(['is_admin'])->group(function () {
//Authenticated routes:

Route::post('loginAdmin', [LoginController::class, 'credentials'])->name('loginAdmin');
Route::get('login', [LoginController::class, 'showLoginForm'])->middleware('verified')->name('login');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('insertAdmin', [RegisterController::class, 'register'])->name('insertAdmin');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('profile', [ProfileController::class, 'showProfile'])->name('Admin');

    // Categories Routes
    Route::get('categories', [Categories::class, 'index'])->name('categories');
    Route::post('insertCategory', [Categories::class, 'store'])->name('insertCategory');
    Route::get('addCategories', [Categories::class, 'create'])->name('addCategories');
    Route::get('editCategories/{id}', [Categories::class, 'edit'])->name('editcategory');
    Route::put('updateCategory/{id}',[Categories::class,'update'])->name('categories.update');
    //Route::put('showCategory/{id}',[Categories::class,'show'])->name('categories.show');
    Route::get('categories/trash', [Categories::class, 'trash'])->name('categories.trash');
    Route::delete('categories/{id}', [Categories::class, 'destroy'])->name('categories.destroy');
    Route::put('categories/{id}/restore', [Categories::class, 'restore'])->name('categories.restore');
    Route::delete('categories/{id}/forceDelete', [Categories::class, 'forceDelete'])->name('categories.forceDelete');

// Beverages Routes


Route::get('/beverages', [Beverages::class, 'index'])->name('beverages');
Route::get('/beverages/create', [Beverage::class, 'create'])->name('beverages.create');
Route::post('/beverages1', [Beverages::class, 'store'])->name('beverages.store');
Route::get('/beverages/{id}', [Beverages::class, 'show'])->name('beverages.show');
Route::get('/beverages/{id}/edit', [Beverages::class, 'edit'])->name('beverages.edit');
Route::put('/beverages/{id}', [Beverages::class, 'update'])->name('beverages.update');
Route::delete('/beverages/{id}', [Beverages::class, 'destroy'])->name('beverages.destroy');
Route::get('/beverages/trash', [Beverages::class, 'trash'])->name('beverages.trash');
Route::post('/beverages/{id}/restore', [Beverages::class, 'restore'])->name('beverages.restore');
Route::delete('/beverages/{id}/force-delete', [Beverages::class, 'forceDelete'])->name('beverages.forceDelete');

 // Users Routes
 Route::get('users', [UserController::class, 'index'])->name('users');
 Route::get('addUsers', [UserController::class, 'create'])->name('addUsers');
 Route::post('insertUsers', [UserController::class, 'store'])->name('insertUsers');
 Route::get('showUser/{id}', [UserController::class, 'show'])->name('showUser');
 Route::get('editUsers/{id}', [UserController::class, 'edit'])->name('editUser');
 Route::put('users/{id}', [UserController::class, 'update'])->name('updateUser');
 //Route::delete('users/{id}', [UserController::class, 'destroy'])->name('destroyUser');
 Route::get('users/trash', [UserController::class, 'trash'])->name('users.trash');
 Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
 Route::put('users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
 Route::delete('users/{id}/forceDelete', [UserController::class, 'forceDelete'])->name('users.forceDelete');


//messages routes
#####################
Route::get('messages', [MessagesController::class, 'index'])->name('messages.index');
Route::delete('messages/{id}', [MessagesController::class, 'destroy'])->name('messages.destroy');
Route::get('message/{id}', [MessagesController::class, 'show'])->name('messages.show');
//contact routes
############################
Route::get('/contact1', [ContactController::class,'index'])->name('contact1');
Route::post('/contact/submit', [ContactController::class,'store'])->name('contact.submit');
Route::post('/send-mail', [ContactController::class, 'sendMail']);
Route::get('/contactShow/{id}', [ContactController::class,'show'])->name('contactShow');
Auth::routes(['verify' => true]);

});