<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use Illuminate\Support\Facades\Auth;
use  App\Http\Controllers\ProductController;
// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// // Authentication Routes
// Route::middleware('guest')->group(function () {
//     // Login Routes
//     Route::get('/login', function () {
//         return view('auth.login');
//     })->name('login');


//     // Registration Routes
//     Route::get('/register', function () {
//         return view('auth.register');
//     })->name('register');
    
//     Route::post('/register', [AdminAuthController::class, 'register']);
// });

// // Email & Phone Verification Routes
// Route::middleware('auth')->group(function () {
//     // Show verification notice
//     Route::get('/email/verify', [AdminAuthController::class, 'showVerificationNotice'])
//         ->name('verification.notice');
        
//     // Handle email verification
//     Route::post('/email/verify', [AdminAuthController::class, 'verifyEmail'])
//         ->name('verification.email');
        
//     // Resend email verification
//     Route::post('/email/resend', [AdminAuthController::class, 'resendVerificationEmail'])
//         ->name('verification.email.resend');
        
//     // Handle phone verification
//     Route::post('/phone/verify', [AdminAuthController::class, 'verifyPhone'])
//         ->name('verification.phone');
        
//     // Resend phone verification
//     Route::post('/phone/resend', [AdminAuthController::class, 'resendVerificationSms'])
//         ->name('verification.phone.resend');
// });

// // Protected Routes (require authentication and email verification)
// Route::middleware(['auth', 'verified'])->group(function () {
//     // Logout Route
//     Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

//     // Home/Dashboard
//     Route::get('/home', function () {
//         return view('home');
//     })->name('home');

//     // Dashboard Redirect
//     Route::get('/dashboard', function () {
//         $user = Auth::user();
        
//         // Redirect based on user type
//         switch ($user->userType) {
//             case 'admin':
//                 return redirect()->route('admin.dashboard');
//             case 'seller':
//                 return redirect()->route('seller.dashboard');
//             case 'customer':
//                 return redirect()->route('customer.dashboard');
//             default:
//                 return redirect()->route('home');
//         }
//     })->name('dashboard');

//     // Admin Dashboard
//     Route::middleware('admin')->group(function () {
//         Route::get('/admin/dashboard', function () {
//             return view('admin.dashboard');
//         })->name('admin.dashboard');
//     });

//     // Seller Dashboard
//     Route::middleware('seller')->group(function () {
//         Route::get('/seller/dashboard', function () {
//             return view('seller.dashboard');
//         })->name('seller.dashboard');
//     });

//     // Customer Dashboard
//     Route::middleware('customer')->group(function () {
//         Route::get('/customer/dashboard', function () {
//             return view('customer.dashboard');
//         })->name('customer.dashboard');
//     });
// });

// // Test routes (remove in production)
// if (app()->environment('local')) {
//     Route::get('/test-email', [\App\Http\Controllers\TestController::class, 'testEmail']);
//     require __DIR__.'/test.php';
// }

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/delete', [ProductController::class, 'destroy'])->name('product.destroy');