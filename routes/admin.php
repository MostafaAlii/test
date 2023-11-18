<?php

use App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [Backend\DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('admins', Backend\AdminController::class);
        Route::resource('users', Backend\UserController::class);
        Route::resource('sliders', Backend\SliderController::class);
        Route::resource('slides', Backend\SlideController::class);
        Route::resource('icons', Backend\IconsController::class);
        Route::resource('partners', Backend\PartnerController::class);
        Route::resource('retouchService', Backend\RetouchServiceController::class);
        Route::resource('orderService', Backend\OrderServiceController::class);
        Route::resource('imgExtension', Backend\ImgExtensionController::class);
        Route::resource('button', Backend\ButtonController::class);
        Route::resource('couple', Backend\CoupleController::class);
        Route::resource('comment', Backend\CommentController::class);
        Route::resource('orderServiceTime', Backend\OrderServiceTimeStatusController::class);
        Route::prefix('mainSettings')->group(function () {
            Route::get('/', [Backend\SettingController::class, 'index'])->name('admin.mainSettings');
            Route::post('save', [Backend\SettingController::class, 'save'])->name('admin.mainSettings.save');
        });
        Route::prefix('feature')->group(function () {
            Route::get('/', [Backend\FeatureController::class, 'index'])->name('admin.feature');
            Route::post('save', [Backend\FeatureController::class, 'save'])->name('admin.feature.save');
        });
        Route::prefix('aboutUs')->group(function () {
            Route::get('/', [Backend\AboutController::class, 'index'])->name('admin.aboutUs');
            Route::post('save', [Backend\AboutController::class, 'save'])->name('admin.aboutUs.save');
        });
        Route::prefix('mainHome')->group(function () {
            Route::get('/', [Backend\HomeController::class, 'index'])->name('admin.mainHome');
            Route::post('save', [Backend\HomeController::class, 'save'])->name('admin.mainHome.save');
        });

        Route::prefix('media-gallery')->group(function () {
            Route::get('/', [Backend\GalleryMediaController::class, 'index'])->name('admin.mainGallery');
            Route::post('store',[Backend\GalleryMediaController::class, 'store'])->name('admin.mainGallery.store');
            Route::post('update/{id}',[Backend\GalleryMediaController::class, 'update'])->name('admin.mainGallery.update');
            Route::post('delete/{id}',[Backend\GalleryMediaController::class, 'destroy'])->name('admin.mainGallery.destroy');
            Route::get('images/{id}',[Backend\GalleryMediaController::class, 'addImages'])->name('admin.mainGallery.images');
            
            Route::post('image',[Backend\GalleryMediaController::class, 'saveProductImages'])->name('admin.mainGallery.images.store');
            Route::post('images/db',[Backend\GalleryMediaController::class, 'saveProductImagesDB'])->name('admin.mainGallery.images.store.db');
            Route::delete('{gallery_id}/image/{image_id}', [Backend\GalleryMediaController::class, 'destroyMedia'])->name('admin.gallery.image.destroy');
        });

        Route::prefix('orders')->group(function () {
            Route::get('/', [Backend\OrderController::class, 'index'])->name('orders.index');
            Route::get('/{id}', [Backend\OrderController::class, 'show'])->name('orders.show');
            Route::post('/order/{id}', [Backend\OrderController::class, 'destroy'])->name('orders.destroy');
            Route::post('/updateStatus/{id}', [Backend\OrderController::class, 'updateStatus'])->name('orders.updateStatus');
        });

        Route::prefix('freeOrders')->group(function () {
            Route::get('/', [Backend\FreeOrderController::class, 'index'])->name('freeOrders.index');
            Route::get('/{id}', [Backend\FreeOrderController::class, 'show'])->name('freeOrders.show');
            Route::post('/order/{id}', [Backend\FreeOrderController::class, 'destroy'])->name('freeOrders.destroy');
        });

        Route::resource('sections', Backend\SectionController::class);
        Route::resource('blogs', Backend\BlogsController::class);
        Route::resource('services', Backend\ServicesController::class);
        Route::resource('packages', Backend\PackagesController::class);
    });
});


require __DIR__ . '/auth.php';