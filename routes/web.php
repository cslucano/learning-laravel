<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;

Route::post('newsletter', function () {
    request()->validate([
        'email' => ['required', 'email']
    ]);
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us17'
    ]);

    try {
        $response = $mailchimp->lists->addListMember('4a5487ee4a', [
            'email_address' => request('email'),
            'status' => 'subscribed',
        ]);    
    } catch( \Exception $e) {
        throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => 'Este email no puede ser agregado a nuestro newsletter.'
        ]);
    }

    return redirect('/')->with('success', 'Ahora, estás inscrito en nuestro newsletter!');
});

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
