<?php

use App\Http\Controllers\UploadImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

Route::get('/', [CustomAuthController::class, 'dashboard']);
Route::get('welcome', [CustomAuthController::class, 'welcome']);
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');

Route::get('change-password', [CustomAuthController::class, 'changePassword'])->name('change.password');
Route::post('change-password', [CustomAuthController::class, 'postChangePassword'])->name('post.change.password');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

/*  ----------  Without image crop and resize -------------
Route::get('upload-image', [UploadImageController::class, 'index'])->name('upload.image');
Route::post('save', [UploadImageController::class, 'save'])->name('save');
*/

//----------  With image crop and resize -------------
Route::get('crop-image-upload', [UploadImageController::class, 'imageUploadPage'])->name('crop-image-upload');
Route::post('crop-image-upload', [UploadImageController::class, 'uploadCropImage'])->name('crop-image-upload');
