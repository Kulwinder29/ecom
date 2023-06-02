<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogDetailController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\productController;
use App\Http\Controllers\productDetailController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog-detail', [BlogDetailController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/product', [productController::class, 'index']);
Route::get('/product-detail', [productDetailController::class, 'index']);
Route::get('/shoping-cart', [ShoppingCartController::class, 'index']);
Route::get('/home-02', function () {
    return view('home-02');
});

// Route::get('/admin/deshboard', function () {
//     return view('admin.index');
// });

// Route::get('/admin/product-master', function () {
//     return view('admin.product_master');
// });

Route::prefix('admin')->group(function () {
    Route::get('/deshboard', function () {
        return view('admin.index');
    });
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.list');
    Route::get('/category-add', [CategoryController::class, 'create'])->name('category.add');
    Route::post('/category-add', [CategoryController::class, 'store'])->name('category.store');
    Route::view('/product-master', 'admin.product_master');
    Route::post('/product-master', [AdminController::class, 'product_insert'])->name('product.insert');
    Route::get('/product-master', [AdminController::class, 'read_data']); //->name('category');
    Route::get('/color-master', [AdminController::class, 'color_index'])->name('color.master');
    Route::post('/color-master', [AdminController::class, 'color_create'])->name('color.craete');
    Route::get('/size-master', [AdminController::class, 'size_index'])->name('size.master');
    Route::post('/size-master', [AdminController::class, 'size_create'])->name('size.craete');



    Route::get('/test', function () {
        return view('admin.tables');
    });
});
Route::post('/getCategory', [AdminController::class, 'getCategory'])->name('getCategory');




// Route::get('/admin/index', [AdminController::class, 'index'])->name('/admin/index');

//Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');