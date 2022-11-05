<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\HomeController;
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

Auth::routes(['register' => false, 'verify' => false]);

Route::get('lang/{locale}', function($locale){
    session()->put('locale', $locale);
    return redirect()->back();
})->name('lang');
Route::get('/logout', [SecurityController::class, 'logout'])->name('logout');


Route::get('/', [FrontController::class, 'homepage'])->name('homepage');
Route::get('/conception-site/{return?}', [FrontController::class, 'description_1'])->name('description_1');
Route::get('/creation-site/{return?}', [FrontController::class, 'description_2'])->name('description_2');
Route::get('/progressive-web-app/{return?}', [FrontController::class, 'description_3'])->name('description_3');
Route::get('/mentions-legales', [FrontController::class, 'mentions'])->name('mentions');
Route::get('/message/{value}', [FrontController::class, 'result'])->name('result');
Route::get('/avis', [FrontController::class, 'testimonies_show'])->name('testimonies.show');
Route::get('/produits', [FrontController::class, 'products'])->name('products');
Route::get('/pwa-ios/{return?}', [FrontController::class, 'pwa_ios'])->name('pwa.ios');
Route::get('/pwa-office/{return?}', [FrontController::class, 'pwa_office'])->name('pwa.office');
Route::get('/pwa/{return?}', [FrontController::class, 'pwa'])->name('pwa');
Route::get('/responsive-design/{return?}', [FrontController::class, 'responsive'])->name('responsive');
Route::get('/seo/{return?}', [FrontController::class, 'seo'])->name('seo');
Route::get('/identite-visuelle/{return?}', [FrontController::class, 'visual_identity'])->name('visual.identity');
Route::get('/nagigation-fluide/{return?}', [FrontController::class, 'fluidity'])->name('fluidity');
Route::get('/site-vitrine/{return?}', [FrontController::class, 'website_1'])->name('website_1');
Route::get('/site-dynamique/{return?}', [FrontController::class, 'website_2'])->name('website_2');
Route::get('/e-commerce/{return?}', [FrontController::class, 'website_3'])->name('website_3');

Route::get('/contact/{devis?}', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact-post', [ContactController::class, 'contact_post'])->name('contact.post');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/mon-profil/{token?}', [BackController::class, 'profile'])->name('user.profile');
    Route::get('/service-client', [BackController::class, 'service_client'])->name('service.client');
    Route::get('/temoignage-del-client-image/{token}', [ClientController::class, 'testimony_delete_image'])->name('client.testimony.delete.image');

    Route::post('/del-notif-ajax', [AjaxController::class, 'delete_notification'])->name('ajax.delete.notification');

});

Route::group(['prefix' => 'dashboard/admin', 'middleware' => ['check.dev']], function () {
    Route::get('/liste-avis', [BackController::class, 'testimonies_list'])->name('testimonies.list');
    Route::get('/ajouter-avis', [BackController::class, 'testimony_add'])->name('testimony.add');
    Route::post('/ajouter-avis-post', [BackController::class, 'testimony_add_post'])->name('testimony.add.post');
    Route::get('/editer-avis/{id}', [BackController::class, 'testimony_edit'])->name('testimony.edit');
    Route::post('/editer-avis-post', [BackController::class, 'testimony_edit_post'])->name('testimony.edit.post');
    Route::get('/temoignage-del-image/{token}', [BackController::class, 'testimony_delete_image'])->name('testimony.delete.image');
    Route::get('/del-temoignage/{token}', [BackController::class, 'testimony_delete'])->name('testimony.delete');
    Route::get('/liste-clients-avis', [BackController::class, 'testimonies_clients_list'])->name('testimonies.clients.list');

    Route::post('/rediger-avis-client-post', [BackController::class, 'client_testimony_post'])->name('admin.testimony.post');

    Route::get('/contact-client/{id}', [ContactController::class, 'contact_client'])->name('contact.client');
    Route::post('/contact-client-post', [ContactController::class, 'contact_client_post'])->name('contact.client.post');
    Route::get('/contact-clients', [ContactController::class, 'contact_clients'])->name('contact.clients');
    Route::post('/contact-clients-post', [ContactController::class, 'contact_clients_post'])->name('contact.clients.post');

    Route::get('/liste-demos', [BackController::class, 'demos_list'])->name('demos.list');
    Route::get('/ajouter-demos', [BackController::class, 'demo_add'])->name('demo.add');
    Route::post('/ajouter-demos-post', [BackController::class, 'demo_add_post'])->name('demo.add.post');
    Route::get('/editer-demos/{id}', [BackController::class, 'demo_edit'])->name('demo.edit');
    Route::post('/editer-demos-post', [BackController::class, 'demo_edit_post'])->name('demo.edit.post');
    Route::get('/del-img-demo/{id}', [BackController::class, 'demo_delete_image'])->name('demo.delete.image');
    Route::get('/del-demo/{id}', [BackController::class, 'demo_delete'])->name('demo.delete');
    Route::get('/position-demo', [BackController::class, 'demo_position'])->name('demo.position');
    Route::post('/position-demo', [AjaxController::class, 'demo_position_post'])->name('demo.position.post');

    Route::get('/liste-team', [BackController::class, 'team_list'])->name('team.list');
    Route::get('/ajouter-team', [BackController::class, 'team_add'])->name('team.add');
    Route::post('/ajouter-teams-post', [BackController::class, 'team_add_post'])->name('team.add.post');
    Route::get('/editer-team/{id}', [BackController::class, 'team_edit'])->name('team.edit');
    Route::post('/editer-team-post', [BackController::class, 'team_edit_post'])->name('team.edit.post');
    Route::get('/del-img-team/{id}', [BackController::class, 'team_delete_image'])->name('team.delete.image');
    Route::get('/del-team/{id}', [BackController::class, 'team_delete'])->name('team.delete');

    Route::get('/liste-clients', [BackController::class, 'clients_list'])->name('clients.list');

    Route::get('/liste-utilisateurs', [BackController::class, 'users_list'])->name('users.list');
    Route::get('/ajouter-user', [BackController::class, 'user_add'])->name('user.add');
    Route::post('/ajouter-user-post', [BackController::class, 'user_add_post'])->name('user.add.post');
    Route::get('/editer-user/{token}', [BackController::class, 'user_edit'])->name('user.edit');
    Route::post('/editer-user-post', [BackController::class, 'user_edit_post'])->name('user.edit.post');
    Route::get('/del-img-user/{id}', [BackController::class, 'user_delete_image'])->name('user.delete.image');
    Route::get('/del-user/{token}', [BackController::class, 'user_delete'])->name('user.delete');

    Route::get('/product-add', [ProductController::class, 'product_add'])->name('product.add');
    Route::get('/product-edit/{token?}', [ProductController::class, 'product_edit'])->name('product.edit');
    Route::post('/product-add-post', [ProductController::class, 'product_add_post'])->name('product.add.post');
    Route::post('/product-edit-post', [ProductController::class, 'product_edit_post'])->name('product.edit.post');
    Route::get('/products-list', [ProductController::class, 'products_list'])->name('products.list');
    Route::get('/product-delete/{token?}', [ProductController::class, 'product_delete'])->name('product.delete');


    Route::get('/user-notification/{token?}', [BackController::class, 'admin_user_notification'])->name('admin.user.notification');
    Route::get('/users-notification', [BackController::class, 'admin_clients_notification'])->name('admin.clients.notification');
    Route::post('/user-notification-post', [BackController::class, 'admin_user_notification_post'])->name('admin.user.notification.post');
    Route::post('/clients-notification-post', [BackController::class, 'admin_clients_notification_post'])->name('admin.clients.notification.post');
    Route::get('/clients-notifications-delete', [BackController::class, 'admin_clients_notifications_delete'])->name('admin.clients.notifications.delete');
    Route::post('/clients-notifications-delete-post', [BackController::class, 'admin_clients_notifications_delete_post'])->name('admin.clients.notifications.delete.post');
    Route::get('/clients-notifications-list', [BackController::class, 'admin_notifications_list'])->name('admin.notifications.list');

    Route::get('/application-add', [ApplicationController::class, 'application_add'])->name('application.add');
    Route::get('/application-client-add/{token?}', [ApplicationController::class, 'application_client_add'])->name('application.client.add');
    Route::get('/application-edit/{token?}', [ApplicationController::class, 'application_edit'])->name('application.edit');
    Route::get('/application-client-edit/{id}', [ApplicationController::class, 'application_client_edit'])->name('application.client.edit');
    Route::post('/application-add-post', [ApplicationController::class, 'application_add_post'])->name('application.add.post');
    Route::post('/application-client-add-post', [ApplicationController::class, 'application_client_add_post'])->name('application.client.add.post');
    Route::post('/application-client-edit-post', [ApplicationController::class, 'application_client_edit_post'])->name('application.client.edit.post');
    Route::post('/application-edit-post', [ApplicationController::class, 'application_edit_post'])->name('application.edit.post');
    Route::get('/applications-list', [ApplicationController::class, 'applications_list'])->name('applications.list');
    Route::get('/application-delete/{token?}', [ApplicationController::class, 'application_delete'])->name('application.delete');
    Route::get('/application-client-delete/{id}', [ApplicationController::class, 'application_client_delete'])->name('application.client.delete');
    Route::get('/application-img-demo/{id}', [ApplicationController::class, 'application_delete_image'])->name('application.delete.image');

    Route::get('/editer-informations-webartys', [InformationController::class, 'edit'])->name('informations.edit');
    Route::post('/editer-informations-webartys-post', [InformationController::class, 'edit_post'])->name('informations.edit.post');
    Route::get('/information-delete-image/{id}', [InformationController::class, 'information_delete_image'])->name('information.delete.image');

    Route::get('/garanties-liste', [PackageController::class, 'packages_list'])->name('packages.list');
    Route::get('/ajouter-garantie', [PackageController::class, 'package_add'])->name('package.add');
    Route::post('/ajouter-garantie-post', [PackageController::class, 'package_add_post'])->name('package.add.post');
    Route::get('/editer-garantie/{id}', [PackageController::class, 'package_edit'])->name('package.edit');
    Route::post('/editer-garantie-post', [PackageController::class, 'package_edit_post'])->name('package.edit.post');
    Route::get('/delete-garantie/{id}', [PackageController::class, 'package_delete'])->name('package.delete');

    Route::get('/admin-tiket-edit/{id?}', [TicketController::class, 'admin_ticket_edit'])->name('admin.ticket.edit');
    Route::post('/admin-tiket-edit-post', [TicketController::class, 'admin_ticket_edit_post'])->name('admin.ticket.edit.post');
    Route::get('/admin-tikets-list', [TicketController::class, 'admin_tickets_list'])->name('admin.tickets.list');
    Route::get('/admin-tiket-delete/{id}', [TicketController::class, 'admin_ticket_delete'])->name('admin.ticket.delete');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['check.client']], function () {
    // Route::get('/check-avis', [ClientController::class, 'check_testimony'])->name('check.exist.client.testimony');
    Route::get('/rediger-avis/{token?}', [ClientController::class, 'testimony'])->name('client.testimony');
    Route::post('/rediger-avis-post', [ClientController::class, 'testimony_post'])->name('client.testimony.post');
    Route::get('/del-client-temoignage/{token}', [ClientController::class, 'testimony_delete'])->name('client.testimony.delete');
    Route::post('/mon-profil-post', [ClientController::class, 'profile_post'])->name('client.profile.post');
    Route::get('/del-client-image/{token}', [ClientController::class, 'delete_image'])->name('client.delete.image');
    Route::get('/editer-profile/{token}', [ClientController::class, 'client_edit'])->name('client.edit');
    Route::post('/editer-profile-post', [ClientController::class, 'client_edit_post'])->name('client.edit.post');
    Route::get('/delete-profile/{token}', [ClientController::class, 'client_delete_confirm'])->name('client.delete.confirm');
    Route::post('/delete-profile-post', [ClientController::class, 'client_delete_confirm_post'])->name('client.delete.confirm.post');
    Route::get('/del-img-client', [ClientController::class, 'client_delete_image'])->name('client.delete.image');
    Route::get('/mes-produits-liste/{token}', [ClientController::class, 'client_products_list'])->name('client.products.list');

    Route::get('/tiket-add', [TicketController::class, 'ticket_add'])->name('ticket.add');
    Route::get('/tiket-edit/{id?}', [TicketController::class, 'ticket_edit'])->name('ticket.edit');
    Route::post('/tiket-add-post', [TicketController::class, 'ticket_add_post'])->name('ticket.add.post');
    Route::post('/tiket-edit-post', [TicketController::class, 'ticket_edit_post'])->name('ticket.edit.post');
    Route::get('/tikets-list/{token?}', [TicketController::class, 'tickets_list'])->name('tickets.list');
    Route::get('/tiket-delete/{token?}', [TicketController::class, 'ticket_delete'])->name('ticket.delete');

    // Route::get('/editer-avis', [ClientController::class, 'edit_testimony'])->name('edit.client.testimony');

});
