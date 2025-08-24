<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', fn() => redirect()->route('products.index'));

Route::resource('products', ProductController::class)
    ->only(['index','create','store','show','edit','update'])
    ->names([
        'index'  => 'products.index',
        'create' => 'products.create',
        'store'  => 'products.store',
        'show'   => 'products.show',
        'edit'   => 'products.edit',
        'update' => 'products.update',
    ]);
