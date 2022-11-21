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


Route::get('/daftar-blog-api', [ApiController::class,'daftar_blog']);
