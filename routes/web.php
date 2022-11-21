<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return redirect('/backend-event');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'CheckRole:admin,super_admin']], function () {

    // Kategori
    Route::controller(KategoriController::class)->group(function(){
        Route::get('/backend-kategori','backend_kategori');
        Route::post('/backend-kategori-store','backend_kategori_store');
        Route::post('/backend-kategori-delete','backend_kategori_delete');
    });

    // Kategori Blog / Tag
    route::controller(TagController::class)->group(function(){
        Route::get('/backend-tag', 'backend_tag');
        Route::post('/backend-tag-store', 'backend_tag_store');
        Route::post('/backend-tag-delete', 'backend_tag_delete');
    });

    // Event
    Route::controller(EventController::class)->group(function(){
        Route::get('/backend-event','backend_event');
        Route::get('/backend-event-create','backend_event_create');
        Route::get('/backend-event-edit/{id}','backend_event_edit');
        Route::post('/backend-event-store','backend_event_store');
        Route::post('/backend-event-delete','backend_event_delete');
    });

    // News = Blog
    Route::controller(BlogController::class)->group(function(){
        Route::get('/backend-blog','backend_blog');
        Route::get('/backend-blog-create','backend_blog_create');
        Route::get('/backend-blog-edit/{id}','backend_blog_edit');
        Route::post('/backend-blog-store','backend_blog_store');
        Route::post('/backend-blog-change-status','backend_ubah_status');
        Route::post('/backend-blog-remove','backend_blog_remove');
    });

    // User
    Route::controller(UserController::class)->group(function(){
        Route::get('/backend-user','backend_user');
        Route::get('/backend-create-user','backend_create_user');
        Route::post('/backend-store-user','backend_store_user');
        Route::post('/backend-remove-user','backend_remove_user');
    });

    // Partner
    Route::controller(PartnerController::class)->group(function(){
        Route::get('/backend-partner', 'backend_partner');
        Route::post('/backend-partner-store', 'backend_partner_store');
        Route::post('/backend-partner-delete', 'backend_partner_delete');
        Route::post('/backend-partner-update', 'backend_partner_update');
    });
     
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/backend-dashboard', 'backend_dashboard');
    });
});
