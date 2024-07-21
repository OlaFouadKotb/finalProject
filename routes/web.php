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
use Illuminate\Auth\Events\Login;
use Symfony\Component\HttpKernel\Profiler\Profiler;
use App\Http\Controllers\MessagesController;


Route::get('/', function () {
    return view('welcome');
});


//Front Pages routes using A Controller :
Route::get('/site', function () {
    return view('homeSite');
});
Route::get('mySiteContct', [ContactController::class, 'showContactForm'])->name('mySiteContct');
Route::post('SiteContact', [ContactController::class, 'sendContact'])->name('SiteContact');
Route::get('SiteCon', [Controller::class, 'contact'])->name('SiteCon');
Route::get('special', [Controller::class, 'special'])->name('special');
Route::get('about', [Controller::class, 'about'])->name('about');
Route::get('drink', [Controller::class, 'drinkMenu'])->name('drink');
Route::get('home', [Controller::class, 'home'])->name('home');
###################################################################################
Route::get('login', [LoginController::class, 'showLoginForm'])->middleware('verified')->name('login');
Route::post('loginAdmin', [LoginController::class, 'credentials'])->name('loginAdmin');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('insertAdmin', [RegisterController::class, 'register'])->name('insertAdmin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
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
Route::get('beverages', [Beverages::class, 'index'])->name('beverages');
Route::get('addbeverages', [Beverages::class, 'create'])->name('addbeverages');
Route::post('insertbeverages', [Beverages::class, 'store'])->name('insertbeverages');
Route::get('showbeverage/{id}', [Beverages::class, 'show'])->name('showbeverage');
Route::get('editbeverages/{id}', [Beverages::class, 'edit'])->name('editbeverage');
Route::put('beverages/{id}', [Beverages::class, 'update'])->name('updatebeverage');
Route::get('beverages/trash', [Beverages::class, 'trash'])->name('beverages.trash');
Route::patch('beverages/restore/{id}', [Beverages::class, 'restore'])->name('restorebeverages');
Route::delete('beverages/{id}', [Beverages::class, 'destroy'])->name('beverages.destroy');
Route::delete('beverages/forceDelete/{id}', [Beverages::class, 'forceDelete'])->name('beverages.forceDelete');
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
//Route::resource('messages', MessagesController::class);
Route::get('messages', [MessagesController::class, 'index'])->name('messages.index');
Route::delete('messages/{id}', [MessagesController::class, 'destroy'])->name('messages.destroy');
Route::get('messages/{id}', [MessagesController::class, 'show'])->name('messages.show');
//contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');
