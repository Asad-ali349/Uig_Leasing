<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiController;

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

Route::get("pay",[apiController::class,"due_invoice"]);
Route::get("due_late_invoice",[apiController::class,"due_late_invoice"]);
Route::get("late_invoice",[apiController::class,"late_invoice"]);
// Route::get("pay",[apiController::class,"payContractAmount"]);
Route::get('stripe', [apiController::class, 'stripePost']);