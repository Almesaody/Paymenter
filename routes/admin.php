<?php

use Illuminate\Support\Facades\Route;

// admin routes;
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [App\Http\Controllers\Admin\MainController::class, 'index'])->middleware(['auth.admin'])->name('admin');

    Route::group(['prefix' => 'tickets'], function () {
        Route::get('/', [App\Http\Controllers\Admin\TicketsController::class, 'index'])->middleware(['auth.admin'])->name('admin.tickets');
        Route::get('/create', [App\Http\Controllers\Admin\TicketsController::class, 'create'])->middleware(['auth.admin'])->name('admin.tickets.create');
        Route::post('/create', [App\Http\Controllers\Admin\TicketsController::class, 'store'])->middleware(['auth.admin'])->name('admin.tickets.store');
        Route::get('/{ticket}', [App\Http\Controllers\Admin\TicketsController::class, 'show'])->middleware(['auth.admin'])->name('admin.tickets.show');
        Route::post('/{ticket}/status', [App\Http\Controllers\Admin\TicketsController::class, 'status'])->middleware(['auth.admin'])->name('admin.tickets.status');
        Route::post('/{ticket}/reply', [App\Http\Controllers\Admin\TicketsController::class, 'reply'])->middleware(['auth.admin'])->name('admin.tickets.reply');
    });

    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->middleware(['auth.admin', 'password.confirm'])->name('admin.settings');
        Route::post('/general', [App\Http\Controllers\Admin\SettingsController::class, 'general'])->middleware(['auth.admin', 'password.confirm'])->name('admin.settings.general');
        Route::post('/email', [App\Http\Controllers\Admin\SettingsController::class, 'email'])->middleware(['auth.admin', 'password.confirm'])->name('admin.settings.email');
        Route::post('/email/test', [App\Http\Controllers\Admin\SettingsController::class, 'testEmail'])->middleware(['auth.admin', 'password.confirm'])->name('admin.settings.email.test');
        Route::post('/login', [App\Http\Controllers\Admin\SettingsController::class, 'login'])->middleware(['auth.admin', 'password.confirm'])->name('admin.settings.login');
        Route::post('/security', [App\Http\Controllers\Admin\SettingsController::class, 'security'])->middleware(['auth.admin', 'password.confirm'])->name('admin.settings.security');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->middleware(['auth.admin'])->name('admin.products');
        Route::get('/create', [App\Http\Controllers\Admin\ProductsController::class, 'create'])->middleware(['auth.admin'])->name('admin.products.create');
        Route::post('/create', [App\Http\Controllers\Admin\ProductsController::class, 'store'])->middleware(['auth.admin'])->name('admin.products.store');
        Route::get('/{product}/edit', [App\Http\Controllers\Admin\ProductsController::class, 'edit'])->middleware(['auth.admin'])->name('admin.products.edit');
        Route::post('/{product}/edit', [App\Http\Controllers\Admin\ProductsController::class, 'update'])->middleware(['auth.admin'])->name('admin.products.update');
        Route::get('/{product}/extension', [App\Http\Controllers\Admin\ProductsController::class, 'extension'])->middleware(['auth.admin'])->name('admin.products.extension');
        Route::post('/{product}/extension', [App\Http\Controllers\Admin\ProductsController::class, 'extensionUpdate'])->middleware(['auth.admin'])->name('admin.products.extension.update');
        Route::delete('/{product}/delete', [App\Http\Controllers\Admin\ProductsController::class, 'destroy'])->middleware(['auth.admin'])->name('admin.products.destroy');
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [App\Http\Controllers\Admin\CategoriesController::class, 'index'])->middleware(['auth.admin'])->name('admin.categories');
        Route::get('/create', [App\Http\Controllers\Admin\CategoriesController::class, 'create'])->middleware(['auth.admin'])->name('admin.categories.create');
        Route::post('/create', [App\Http\Controllers\Admin\CategoriesController::class, 'store'])->middleware(['auth.admin'])->name('admin.categories.store');
        Route::get('/{category}', [App\Http\Controllers\Admin\CategoriesController::class, 'show'])->middleware(['auth.admin'])->name('admin.categories.show');
        Route::get('/{category}/edit', [App\Http\Controllers\Admin\CategoriesController::class, 'edit'])->middleware(['auth.admin'])->name('admin.categories.edit');
        Route::post('/{category}/edit', [App\Http\Controllers\Admin\CategoriesController::class, 'update'])->middleware(['auth.admin'])->name('admin.categories.update');
        Route::delete('/{category}/delete', [App\Http\Controllers\Admin\CategoriesController::class, 'destroy'])->middleware(['auth.admin'])->name('admin.categories.delete');
    });

    Route::group(['prefix' => 'extensions'], function () {
        Route::get('/', [App\Http\Controllers\Admin\ExtensionsController::class, 'index'])->middleware(['auth.admin', 'password.confirm'])->name('admin.extensions');
        Route::get('/edit/{sort}/{name}', [App\Http\Controllers\Admin\ExtensionsController::class, 'edit'])->middleware(['auth.admin', 'password.confirm'])->name('admin.extensions.edit');
        Route::post('/edit/{sort}/{name}', [App\Http\Controllers\Admin\ExtensionsController::class, 'update'])->middleware(['auth.admin', 'password.confirm'])->name('admin.extensions.update');
    });

    Route::group(['prefix' => 'clients'], function () {
        Route::get('/', [App\Http\Controllers\Admin\ClientsController::class, 'index'])->middleware(['auth.admin'])->name('admin.clients');
        Route::get('/create', [App\Http\Controllers\Admin\ClientsController::class, 'create'])->middleware(['auth.admin'])->name('admin.clients.create');
        Route::post('/create', [App\Http\Controllers\Admin\ClientsController::class, 'store'])->middleware(['auth.admin'])->name('admin.clients.store');
        Route::get('/{user}', [App\Http\Controllers\Admin\ClientsController::class, 'show'])->middleware(['auth.admin'])->name('admin.clients.show');
        Route::get('/{user}/login', [App\Http\Controllers\Admin\ClientsController::class, 'loginasClient'])->middleware(['auth.admin'])->name('admin.clients.loginasclient');
        Route::get('/{user}/edit', [App\Http\Controllers\Admin\ClientsController::class, 'edit'])->middleware(['auth.admin'])->name('admin.clients.edit');
        Route::put('/{user}/edit', [App\Http\Controllers\Admin\ClientsController::class, 'update'])->middleware(['auth.admin'])->name('admin.clients.update');
        Route::delete('/{user}/delete', [App\Http\Controllers\Admin\ClientsController::class, 'destroy'])->middleware(['auth.admin'])->name('admin.clients.delete');
    });

    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', [App\Http\Controllers\Admin\OrdersController::class, 'index'])->middleware(['auth.admin'])->name('admin.orders');
        Route::delete('/{order}/delete', [App\Http\Controllers\Admin\OrdersController::class, 'destroy'])->middleware(['auth.admin'])->name('admin.orders.delete');
        Route::get('/{order}', [App\Http\Controllers\Admin\OrdersController::class, 'show'])->middleware(['auth.admin'])->name('admin.orders.show');
        Route::post('/{order}/unsuspend', [App\Http\Controllers\Admin\OrdersController::class, 'unsuspend'])->middleware(['auth.admin'])->name('admin.orders.unsuspend');
        Route::post('/{order}/suspend', [App\Http\Controllers\Admin\OrdersController::class, 'suspend'])->middleware(['auth.admin'])->name('admin.orders.suspend');
        Route::post('/{order}/create', [App\Http\Controllers\Admin\OrdersController::class, 'create'])->middleware(['auth.admin'])->name('admin.orders.create');
        Route::post('/{order}/paid', [App\Http\Controllers\Admin\OrdersController::class, 'paid'])->middleware(['auth.admin'])->name('admin.orders.paid');
    });

    Route::group(['prefix' => 'coupon'], function() {
        Route::get('/', [App\Http\Controllers\Admin\CouponController::class, 'index'])->middleware(['auth.admin'])->name('admin.coupon');
        Route::get('/create', [App\Http\Controllers\Admin\CouponController::class, 'create'])->middleware(['auth.admin'])->name('admin.coupon.create');
        Route::post('/create', [App\Http\Controllers\Admin\CouponController::class, 'store'])->middleware(['auth.admin'])->name('admin.coupon.store');
        Route::get('/{coupon}/edit', [App\Http\Controllers\Admin\CouponController::class, 'edit'])->middleware(['auth.admin'])->name('admin.coupon.edit');
        Route::put('/{coupon}/edit', [App\Http\Controllers\Admin\CouponController::class, 'update'])->middleware(['auth.admin'])->name('admin.coupon.update');
        Route::delete('/{coupon}/delete', [App\Http\Controllers\Admin\CouponController::class, 'destroy'])->middleware(['auth.admin'])->name('admin.coupon.delete');
    });
    
    // Route::group(['prefix' => 'migrate'], function () {
    //     Route::get('/', [App\Http\Controllers\Admin\MigrateController::class, 'index'])->middleware(['auth.admin'])->name('admin.migrate.index');
    //     Route::get('/whmcs', [App\Http\Controllers\Admin\MigrateController::class, 'whmcs'])->middleware(['auth.admin'])->name('admin.migrate.whmcs');
    //     Route::post('/whmcs', [App\Http\Controllers\Admin\MigrateController::class, 'whmcsImport'])->middleware(['auth.admin'])->name('admin.migrate.whmcs.import');
    //     Route::get('/blesta', [App\Http\Controllers\Admin\MigrateController::class, 'blesta'])->middleware(['auth.admin'])->name('admin.migrate.blesta');
    // }
    // );
});