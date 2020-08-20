<?php

use Illuminate\Support\Facades\Route;

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

use Carlituxman\Test\Test;

Route::get('/test/{name}', function($sName) {
    $oGreetr = new Test();
    return $oGreetr->hola($sName);
});

Route::view('/', 'welcome');
Route::view('/home', 'home')->name('home')->middleware('auth');//->middleware('verify');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::layout('layouts.auth')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::livewire('login', 'auth.login')
            ->name('login');

        Route::livewire('register', 'auth.register')
            ->name('register');
    });

    Route::livewire('password/reset', 'auth.passwords.email')
        ->name('password.request');

    Route::livewire('password/reset/{token}', 'auth.passwords.reset')
        ->name('password.reset');

    Route::middleware('auth')->group(function () {
        Route::livewire('email/verify', 'auth.verify')
            ->middleware('throttle:6,1')
            ->name('verification.notice');

        Route::livewire('password/confirm', 'auth.passwords.confirm')
            ->name('password.confirm');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', 'Auth\EmailVerificationController')
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', 'Auth\LogoutController')
        ->name('logout');
});

Route::group(
    [
        'namespace'   => 'Notification',
        'prefix'      => 'notification',
        'as'          => 'notification.',
    ],

    function()
    {

        // Notifications
        Route::post('notifications', 'NotificationController@store');
        Route::get('notifications', 'NotificationController@index');
        Route::get('notifications/{id}/read', 'NotificationController@markAsRead');
        Route::post('notifications/mark-all-read', 'NotificationController@markAllRead');
        Route::post('notifications/{id}/dismiss', 'NotificationController@dismiss');

        // Push Subscriptions
        Route::post('subscriptions', 'PushSubscriptionController@update');
        Route::post('subscriptions/delete', 'PushSubscriptionController@destroy');
    }
);

// Manifest file (optional if VAPID is used)
Route::get('manifest.json', function () {
    return [
        'name' => config('app.name'),
        'gcm_sender_id' => config('webpush.gcm.sender_id')
    ];
});
