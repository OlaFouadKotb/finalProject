<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Categories;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Beverages;
use App\Http\Controllers\DrinkController;
use App\Models\Beverage;
use App\Models\Category;
use App\Models\User;
use App\Models\Message;
use App\Mail\ContactMail;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\HomeController;





//Front Pages routes using A Controller :
Route::get('mySite', [HomeController::class, 'index'])->name('mySite');
Route::get('drinks', [HomeController::class, 'drink'])->name('drinks');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('special', [HomeController::class, 'special'])->name('special');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');

###################################################################################


    Route::get('/', function () {
            return view('welcome');
         });
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('loginAdmin', [LoginController::class, 'credentials'])->name('loginAdmin');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('insertAdmin', [RegisterController::class, 'register'])->name('insertAdmin');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('profile', [ProfileController::class, 'showProfile'])->name('profile');

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


Route::get('/beverages', [DrinkController::class, 'index'])->name('beverages');
Route::get('/beverages/create', [DrinkController::class, 'create'])->name('beverages.create');
Route::post('/beverages1', [DrinkController::class, 'store'])->name('beverages.store');
Route::get('/beverages/{id}', [DrinkController::class, 'show'])->name('beverages.show');
Route::get('/beverages/{id}/edit', [DrinkController::class, 'edit'])->name('beverages.edit');
Route::put('/beverages/{id}', [DrinkController::class, 'update'])->name('beverages.update');
Route::delete('/beverages/{id}', [DrinkController::class, 'destroy'])->name('beverages.destroy');
Route::get('/beverages/trash', [DrinkController::class, 'trash'])->name('beverages.trash');
Route::post('/beverages/{id}/restore', [DrinkController::class, 'restore'])->name('beverages.restore');
Route::delete('/beverages/{id}/force-delete', [DrinkController::class, 'forceDelete'])->name('beverages.forceDelete');

 // Users Routes
 Route::get('users', [UserController::class, 'index'])->name('users');
 Route::get('addUsers', [UserController::class, 'create'])->name('addUsers');
 Route::post('insertUsers', [UserController::class, 'store'])->name('insertUsers');
 Route::get('showUser/{id}', [UserController::class, 'show'])->name('showUser');
 Route::get('editUsers/{id}', [UserController::class, 'edit'])->name('editUser');
 Route::put('users/{id}', [UserController::class, 'update'])->name('updateUser');
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
Route::get('contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact/submit', [ContactController::class,'store'])->name('contact.submit');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::get('/contactShow/{id}', [ContactController::class,'show'])->name('contactShow');
Auth::routes(['verify' => true]);

