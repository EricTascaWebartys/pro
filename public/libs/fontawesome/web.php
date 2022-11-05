<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AdminController;
// use App\Http\Middleware;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontController::class, 'homepage'])->name('homepage');
Route::get('/mentions-legales', [FrontController::class, 'mentions'])->name('mentions');
Route::get('/descriptions', [FrontController::class, 'descriptions'])->name('descriptions');
Route::get('/validation-compte/{token?}', [FrontController::class, 'validate_account'])->name('validate_account');
Route::get('/creation-compte/{token?}', [FrontController::class, 'result'])->name('result');
Route::get('/reinitialiser-mdp/{token?}', [FrontController::class, 'result_reset_email'])->name('result_reset_email');
Route::get('/mdp-success/{token?}', [FrontController::class, 'result_new_password'])->name('result_new_password');
Route::post('/contact-post', [FrontController::class, 'contact_post'])->name('contact_post');

Route::get('/connexion', [SecurityController::class, 'login'])->name('login')->middleware('check.connect');
Route::post('/connexion_post/{user?}', [SecurityController::class, 'login_post'])->name('login_post');
Route::get('/inscription', [SecurityController::class, 'subscribe'])->name('subscribe')->middleware('check.connect');
Route::post('/inscription_post', [SecurityController::class, 'subscribe_post'])->name('subscribe_post');
Route::get('/logout_post', [SecurityController::class, 'logout_post'])->name('logout_post');
Route::get('/mon-email', [SecurityController::class, 'my_email'])->name('my_email');
Route::post('/mon-email-post', [SecurityController::class, 'my_email_post'])->name('my_email_post');
Route::get('/nouveau-mdp/{token}', [SecurityController::class, 'password_new'])->name('password_new');
Route::post('/nouveau-mdp-post/{token}', [SecurityController::class, 'password_new_post'])->name('password_new_post');
Route::post('/participe-post', [SecurityController::class, 'participe_post'])->name('participe_post');
Route::post('/participe-paspost', [SecurityController::class, 'participe_pas_post'])->name('participe_pas_post');

Route::post('/cookies_post', [CookieController::class, 'check_cookies'])->name('check_cookies');

Route::get('/email', function () {
    return view('/mail/confirm_email');
});

// ---------------------------------------------USER------------------------------------------
// Route::get('/mon-profil', [UserController::class, 'profile'])->name('profile')->middleware('auth');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/mon-profile/{token}', [UserController::class, 'profil'])->name('profil');
    Route::get('/editer-profile/{token}', [UserController::class, 'edit_profil'])->name('edit_profil');
    Route::post('/editer-profile-post', [UserController::class, 'edit_profil_post'])->name('edit_profil_post');
    Route::get('/delete-user-post/{token}', [UserController::class, 'delete_user_post'])->name('delete_user_post');
});


// ---------------------------------------------ADMIN------------------------------------------
// Route::get('/mon-profil', [UserController::class, 'profile'])->name('profile')->middleware('check.admin');

Route::group(['middleware' => ['check.admin']], function () {
    Route::get('/ajouter-cours', [AdminController::class, 'add_cours'])->name('add_cours');
    Route::post('/ajouter-cours-post', [AdminController::class, 'add_cours_post'])->name('add_cours_post');
    Route::get('/modifier-cours/{id}', [AdminController::class, 'edit_cours'])->name('edit_cours');
    Route::post('/modifier-cours-post', [AdminController::class, 'edit_cours_post'])->name('edit_cours_post');
    Route::post('/delete-cours-post', [AdminController::class, 'delete_cours_post'])->name('delete_cours_post');
    Route::get('/participants/{id}', [AdminController::class, 'participants_list'])->name('participants_list');
    Route::get('/utilisateurs', [AdminController::class, 'users_list'])->name('users_list');

});
