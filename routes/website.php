<?php

use App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['as' => 'website.'], function () {
    Route::get('/',[Frontend\FrontController::class, 'index'])->name('home');

    Route::group(['prefix' => 'client', 'middleware' => ['auth:web']], function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('editProfile',[Frontend\ClientController::class, 'editProfile'])->name('editProfile');
            Route::post('ProfileEdit',[Frontend\ClientController::class, 'ProfileEdit'])->name('ProfileEdit');
            Route::get('/', [Frontend\ClientController::class, 'index'])->name('client.dashboard');
            Route::get('retouching-style', [Frontend\RetouchingStyleController::class, 'index'])->name('client.retouchingStyle');
            Route::post('retouching-style/save', [Frontend\RetouchingStyleController::class,'save'])->name('retouching-style.save');
            Route::resource('orders', Frontend\OrderController::class);
            Route::get('delete-service/{id}/{order_id}', [Frontend\OrderController::class, 'deleteService'])->name('order.delete.service');
            Route::put('orders/{order}/update_details', [Frontend\OrderController::class, 'updateDetails'])->name('order.update_details');
            Route::put('orders/complete', [Frontend\ClientController::class, 'getCompleteOrder'])->name('order.completed');
            Route::put('orders/progress', [Frontend\ClientController::class, 'getProcessOrder'])->name('order.progress');

            Route::get('order/checkout/{order_id}/cancelled', [Frontend\OrderController::class, 'cancelled'])->name('order.checkout.cancel');
            Route::get('order/checkout/{order_id}/completed', [Frontend\OrderController::class, 'completed'])->name('order.checkout.complete');
            Route::get('order/checkout/webhook/{order?}/{env?}', [Frontend\OrderController::class, 'webhook'])->name('order.check.webhook.ipn');
        });
    });
});

require __DIR__.'/auth.php';
