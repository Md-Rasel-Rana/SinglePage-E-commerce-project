<?php
use App\Http\Controllers\DemoController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DemoController::class,'index']);
Route::get('/singlepage{id}',[DemoController::class,'singlepageview'])->name('singlepageview');
Route::post('/add', [DemoController::class,'addToCart'])->name('add.Cart');
Route::get('/view',[DemoController::class,'cartToshow'])->name('cart.view');
Route::get('/delete/{id}',[DemoController::class,'productDelete'])->name('product.delete');
Route::post('/update',[DemoController::class,'productUpdate'])->name('cart.update');
