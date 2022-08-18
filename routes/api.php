<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\itemController;


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

//GET all items from items table (index)
Route::get('/items', [itemController::class, 'index']);

//GET 1 item from items table based on id (show)
Route::get('/items/{id}', [itemController::class, 'show']);

//POST JSON array to be stored in Rest API (store)
Route::post('/items/create', [itemController::class, 'store']);

//PUT new data into existing item record (update)
Route::put('/items/{id}', [itemController::class, 'update']);

//DELETE an item from items table based on item id
Route::delete('/items/{id}', [itemController::class, 'destroy']);

//GET search result for item name where item name is like request parameter (query string)
Route::get('/items', [itemController::class, 'searchByItemName']);

//GET result of items from specific category AND supplier 
Route::get('/items', [itemController::class, 'categorySupplier']);

//GET the total price of the price column (Aggregate function SUM())
Route::get('/totalPrice', [itemController::class, 'totalPrice']);