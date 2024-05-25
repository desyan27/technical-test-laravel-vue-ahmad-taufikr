<?php

use App\Http\Controllers\ProfileController;
use App\Models\Categories;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/user', function () {
    return Inertia::render('User');
})->middleware(['auth', 'verified'])->name('user');

Route::get('/products', function () {
    return Inertia::render('Products');
})->middleware(['auth', 'verified'])->name('products');

Route::get('/categories', function () {
    return Inertia::render('Categories');
})->middleware(['auth', 'verified'])->name('categories');

Route::get('/orders', function () {
    return Inertia::render('Orders');
})->middleware(['auth', 'verified'])->name('orders');

Route::middleware('auth')->group(function () {
    Route::get('/products/create', function () {
        return Inertia::render('Products/Create');
    })->name('products.create');
    Route::get('/products/{pd_id}/edit', function () {
        return Inertia::render('Products/Edit');
    })->name('products.edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/products/create', function () {
        return Inertia::render('CreateProducts');
    })->name('products.create');
    Route::get('/products/{pd_id}/edit', function ($pd_id) {

        $product = Products::find($pd_id);
        return Inertia::render('UpdateProducts', [
            'product' => $product
        ]);
    })->name('products.edit');
});

Route::middleware('auth')->group(function () {
   Route::get('/categories/create', function () {
       return Inertia::render('CreateCategories');
   })->name('categories.create');
   Route::get('/categories/{ct_id}/edit', function ($ct_id) {
        $category = Categories::find($ct_id);
       return Inertia::render('UpdateCategories', [
           'category' => $category
       ]);
   })->name('categories.edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/orders/create', function () {
        return Inertia::render('CreateOrders');
    })->name('orders.create');
    Route::get('/orders/{or_id}/edit', function ($or_id) {
        $order = Orders::find($or_id);
        return Inertia::render('UpdateOrders',[
            'order' => $order
        ]);
    })->name('orders.edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/user/{us_id}/edit', function ($us_id) {
        $user = User::find($us_id);
        return Inertia::render('UpdateUser', [
            'user' => $user
        ]);
    })->name('user.edit');
});

require __DIR__.'/auth.php';
