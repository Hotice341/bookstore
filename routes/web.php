<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider, and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * Auth Routes
 */
Auth::routes();

/**
 * HomePage
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * About Us page
 */
Route::get('/about', function (){
    return view('about');
})->name('about');

/**
 * Blog Page
 */
Route::get('/blogs', [BlogController::class, 'blogs'])->name('blogs');
Route::get('/blog-details/{id}', [BlogController::class, 'blogDetails'])->name('blogs.details');

// Books Route
Route::get('/books', [HomeController::class, 'books'])->name('books');
Route::get('/book-details/{id}', [HomeController::class, 'bookDetails'])->name('books.details');

// Categories
Route::get('/category/{slug}', [HomeController::class, 'categoryDetails'])->name('category.details');

// Buy Book
Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);

// Registration View
Route::get('/sign-up', [UserController::class, 'signUp'])->name('sign-up');

// Login View
Route::get('/sign-in', [UserController::class, 'signIn'])->name('sign-in');

// Post Registration
Route::post('/create-user', [UserController::class, 'createUser'])->name('create-user');

// Verify Otp
Route::get('/verify-email/{id}', [UserController::class, 'verifyEmail'])->name('verify-email'); // Get
Route::post('/verify-email/{id}', [UserController::class, 'verifyOtp'])->name('verify.email'); // Post

// Forgot Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPasswordPost'])->name('forgot-password.post');
Route::get('/confirm-password/{id}', [ForgotPasswordController::class, 'confirmPassword'])->name('password.confirm');
Route::post('/confirm-password/{id}', [ForgotPasswordController::class, 'confirmPasswordPost'])->name('password.confirm.post');

// Reset Password
Route::get('/reset-password/{id}', [ResetPasswordController::class, 'resetPasswordPage'])->name('password.reset');
Route::post('/reset-password/{id}', [ResetPasswordController::class, 'resetPasswordPost'])->name('password.reset.post');

// Resend Otp
Route::get('/resend-otp/{id}', [UserController::class, 'resendOtp'])->name('resend-otp');
Route::get('/resend-reset-otp/{id}', [ForgotPasswordController::class, 'resendResetOTP'])->name('resend.reset.otp');

// User Dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('logout', [HomeController::class, 'logout'])->name('logout');

// Admin Dashboard
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Users
    Route::get('users', [AdminController::class, 'users'])->name('admin.users');
    Route::patch('users/{user}/ban', [AdminController::class, 'ban'])->name('admin.user.ban');
    Route::patch('users/{user}/unban', [AdminController::class, 'unban'])->name('admin.user.unban');

    // Category Routes
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('categories/{category}/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Books Routes
    Route::get('books', [BookController::class, 'index'])->name('books.index');
    Route::get('books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('books/store', [BookController::class, 'store'])->name('books.store');
    Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::post('books/{book}/update', [BookController::class, 'update'])->name('books.update');
    Route::delete('books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
    Route::get('books/trashed', [BookController::class, 'trashed'])->name('books.trashed');

    Route::patch('books/restore/{book}', [BookController::class, 'restore'])->name('books.restore');
    Route::delete('books/force-delete/{book}', [BookController::class, 'forceDelete'])->name('books.force.delete');

    // Book Orders
    Route::get('books/orders', [TransactionsController::class, 'bookOrders'])->name('books.orders');
    Route::patch('books/approve/{book}', [TransactionsController::class, 'approveBookOrder'])->name('books.approve');
    Route::patch('books/decline/{book}', [TransactionsController::class, 'declineBookOrder'])->name('books.decline');

    // Transactions
    Route::get('transactions', [TransactionsController::class, 'index'])->name('transactions.index');
});

Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('dashboard', [UserController::class, 'user_dashboard'])->name('user.dashboard');

    // Profile Management
    Route::get('profile', [ProfileController::class, 'user_profile'])->name('user.profile');
    Route::put('profile/edit', [ProfileController::class, 'user_profile_edit'])->name('user.profile.edit');
    Route::delete('profile/delete', [ProfileController::class, 'user_profile_delete'])->name('user.profile.delete');

    // Password Management
    Route::post('password/edit', [ProfileController::class, 'user_profile_password'])->name('user.profile.password');
});
