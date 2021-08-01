<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\AllCategoryController;
use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\DB; 
use Illuminate\Database\Eloquent\SoftDeletes;

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
    return view('welcome');
});

//category controller
Route::get('/category/all',[AllCategoryController::class,'AllCat'])->name('all.category');
Route::post('/category/add',[AllCategoryController::class,'AddCat'])->name('store.category');
Route::get('/category/edit/{id}', [AllCategoryController::class, 'Edit']);
Route::put('/category/update/{id}', [AllCategoryController::class, 'Update']);

Route::get('/sofdelete/category/{id}', [AllCategoryController::class, 'SoftDelete']);
/// brand controller
Route::get('/brand/all',[BrandController::class,'AllBrand'])->name('all.Brandy');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //$users = User::all(); 
    $users = DB::table('users')->get(); // query builder
    return view('dashboard',compact('users'));
})->name('dashboard');

