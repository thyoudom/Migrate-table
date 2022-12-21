<?php

use App\Services\FileManager;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin as Admin;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SlideController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Auth
Route::prefix('auth') ->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin-login');
        });
        Route::get('/login', [UserController::class, 'login'])->name('login');
        Route::get('/forgot', [UserController::class, 'forgotPassword'])->name('forgot-password');
        Route::post('/login/post', [AuthController::class, 'login'])->name('login-post');
        Route::get('/sign-out', [AuthController::class, 'signOut'])->name('sign-out');
});

Route::middleware(['AdminGuard'])
    ->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin-dashboard');
        });

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // User
        Route::prefix('user')
            ->name('user-')
            ->group(function () {
                Route::get('list/{id?}', [UserController::class, 'index'])->name('list');
                Route::get('create/{id?}', [UserController::class, 'onCreate'])->name('create');
                Route::post('save/{id?}', [UserController::class, 'onSave'])->name('save');
                Route::match(['get', 'post'], 'status/{id}/{status}', [UserController::class, 'onUpdateStatus'])->name('status');
                Route::get('change-password/{id}', [UserController::class, 'onChangePassword'])->name('change-password');
                Route::post('save-password/{id}', [UserController::class, 'onSavePassword'])->name('save-password');
                Route::get('permission/{id}', [UserController::class, 'setPermission'])->name('permission');
                Route::post('save-permission/{id}', [UserController::class, 'savePermission'])->name('save-permission');
            });
        //Slide
        Route::group([
            'prefix' => 'slide',
            'as'     => 'slide-'
        ], function () {
            Route::get('list/{status?}', [SlideController::class, 'index'])->name('list');
            Route::get('create', [SlideController::class, 'onCreate'])->name('create');
            Route::get('edit/{id?}', [SlideController::class, 'onEdit'])->name('edit');
            Route::post('save/{id?}', [SlideController::class, 'onSave'])->name('save');
            Route::match(['get', 'post'], 'status/{id}/{status}', [SlideController::class, 'onUpdateStatus'])->name('status');
            Route::get('delete/{id}', [SlideController::class, 'delete'])->name('delete');
            Route::get('restore/{id}', [SlideController::class, 'Restore'])->name('restore');
            Route::get('destroy/{id}', [SlideController::class, 'Destroy'])->name('destroy');
        });
        //File Manager
        Route::prefix('file-manager')
            ->name('file-manager-')
            ->group(function () {
                Route::get('/index', [FileManager::class, 'index'])->name('index');
                Route::get('/first', [FileManager::class, 'first'])->name('first');
                Route::get('/files', [FileManager::class, 'getFiles'])->name('files');
                Route::get('/folders', [FileManager::class, 'getFolders'])->name('folders');
                Route::post('/upload', [FileManager::class, 'uploadFile'])->name('upload');
                Route::post('/rename-file', [FileManager::class, 'renameFile'])->name('rename-file');
                Route::delete('/delete-file', [FileManager::class, 'deleteFile'])->name('delete-file');

                //folder
                Route::post('/create-folder', [FileManager::class, 'createFolder'])->name('create-folder');
                Route::post('/rename-folder', [FileManager::class, 'renameFolder'])->name('rename-folder');
                Route::delete('/delete-folder', [FileManager::class, 'deleteFolder'])->name('delete-folder');

                //trash bin
                Route::delete('/delete-all', [FileManager::class, 'deleteAll'])->name('delete-all');
                Route::put('/restore-all', [FileManager::class, 'restoreAll'])->name('restore-all');
            });

        // Route::group(['prefix' => 'orders', 'as' => 'order-'], function () {
        //     Route::get('/', [Admin\OrderController::class, 'index'])->name('list');
        //     Route::get('/detail/{id}', [Admin\OrderController::class, 'detail'])->name('detail');
        //     Route::match(['get', 'post'], '/update-status', [Admin\OrderController::class, 'onUpdateStatus'])->name('update-status');
        // });

        // Page
        Route::group([
            'prefix' => 'page',
            'as' => 'page-',
        ], function () {
            Route::get('/{type?}', [Admin\PageController::class, 'page'])->name('page');
            Route::post('save/{id?}', [Admin\PageController::class, 'onSave'])->name('save');
        });

        /////Contact
        Route::group([
            'prefix' => 'contact',
            'as' => 'contact-',
        ], function () {
            Route::get('/{type?}', [Admin\ContactController::class, 'index'])->name('contact');
            Route::post('save/{id?}', [Admin\ContactController::class, 'store'])->name('save');
        });
    });

Route::get('clear-cache', function () {
    Artisan::call('optimize:clear');
    return "Cache is cleared";
});

Route::group(['prefix' => 'geo-api'], function () {
    Route::get('district/{id}', [Admin\Api\GeoController::class, 'getDistrict']);
    Route::get('commune/{id}', [Admin\Api\GeoController::class, 'getCommune']);
    Route::get('village/{id}', [Admin\Api\GeoController::class, 'getVillage']);
});

Route::group(['prefix' => 'setting-api'], function () {
    Route::get('check-phone', [Admin\Api\SettingController::class, 'checkUserPhoneExit'])->name('setting.api.check.phone');
});
