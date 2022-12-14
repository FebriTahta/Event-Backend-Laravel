<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 
Route::get('daftar-event-api',[ApiController::class,'daftar_event']);
Route::get('daftar-kategori-api',[ApiController::class,'daftar_kategori']);
Route::get('search-kategori-api/{kategori_slug}',[ApiController::class,'search_kategori']);
Route::get('search-event/{search}', [ApiController::class,'search_event']);


Route::controller(ApiController::class)->group(function(){
    Route::get('/daftar-blog','daftar_blog');
    Route::get('/blog/{slug}','detail_blog');
    Route::get('/popular-blog','popular_blog');
    Route::get('/similar-blog/{tag_id}/{exept_current}','similar_blog');
    Route::get('/search-blog/{search}', 'search_blog');

    Route::get('/tag-blog','daftar_tag_blog');
    Route::get('/daftar-blog/tag/{tag_slug}','daftar_blog_tag');
    Route::get('/search-blog-in-tag/{tag_slug}/{search}','search_blog_in_tag');

    Route::get('/newest-blog','newest_blog');
});
