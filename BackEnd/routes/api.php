<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImagesVariantController;
use App\Http\Controllers\CommentController;

//User API CRUDS
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

// Product API CRUDS
Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

// Category API CRUDS
Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

// Variant API CRUDS
Route::get('/variants', [VariantController::class, 'index']);
Route::post('/variants', [VariantController::class, 'store']);
Route::get('/variants/{id}', [VariantController::class, 'show']);
Route::put('/variants/{id}', [VariantController::class, 'update']);
Route::delete('/variants/{id}', [VariantController::class, 'destroy']);

// Size API CRUDS
Route::get('/sizes', [SizeController::class, 'index']);
Route::post('/sizes', [SizeController::class, 'store']);
Route::get('/sizes/{id}', [SizeController::class, 'show']);
Route::put('/sizes/{id}', [SizeController::class, 'update']);
Route::delete('/sizes/{id}', [SizeController::class, 'destroy']);

// Image API CRUDS
Route::get('/images', [ImageController::class, 'index']);
Route::post('/images', [ImageController::class, 'store']);
Route::get('/images/{id}', [ImageController::class, 'show']);
Route::put('/images/{id}', [ImageController::class, 'update']);
Route::delete('/images/{id}', [ImageController::class, 'destroy']);

// ImagesVariant API CRUDS
Route::get('/images-variants', [ImagesVariantController::class, 'index']);
Route::post('/images-variants', [ImagesVariantController::class, 'store']);
Route::get('/images-variants/{id}', [ImagesVariantController::class, 'show']);
Route::put('/images-variants/{id}', [ImagesVariantController::class, 'update']);
Route::delete('/images-variants/{id}', [ImagesVariantController::class, 'destroy']);

//Comment API CS
Route::get('/comments', [CommentController::class, 'index']);
Route::post('/comments', [CommentController::class, 'store']);