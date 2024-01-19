<?php

use App\Http\Controllers\dashboard\AvailabilityController;
use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\dashboard\CompanyController;
use App\Http\Controllers\dashboard\ProductPriceController;
use App\Http\Controllers\dashboard\ReserveController;
use App\Http\Controllers\dashboard\TypeProductController;
use App\Http\Controllers\dashboard\SellersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\settings\PermissionController;
use App\Http\Controllers\settings\RolesController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});
