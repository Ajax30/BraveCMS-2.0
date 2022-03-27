<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ArticleCategoryController;
use App\Http\Controllers\Dashboard\ArticleController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('homepage');

// Dashboard routes
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function() {
  Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

	// Category routes
	Route::group(['prefix' => 'categories'], function() {
		Route::get('/', [ArticleCategoryController::class, 'index'])->name('dashboard.categories');
		Route::get('/edit/{id}', [ArticleCategoryController::class, 'edit'])->name('dashboard.categories.edit');
		Route::get('/delete/{id}', [ArticleCategoryController::class, 'delete'])->name('dashboard.categories.delete');
	});

	// Article routes
	Route::group(['prefix' => 'articles'], function() {
		Route::get('/', [ArticleController::class, 'index'])->name('dashboard.articles');
		Route::get('/new', [ArticleController::class, 'create'])->name('dashboard.articles.new');
		Route::post('/add', [ArticleController::class, 'save'])->name('dashboard.articles.add');
		Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('dashboard.articles.edit');
		Route::post('/update/{id}', [ArticleController::class, 'update'])->name('dashboard.articles.update');
		Route::get('/delete/{id}', [ArticleController::class, 'delete'])->name('dashboard.articles.delete');
	}); 

	// User routes
	Route::group(['prefix' => 'user'], function() {
		Route::get('/', [UserController::class, 'index'])->name('user');
		Route::match(['get', 'post'],'/update', [UserController::class, 'update'])->name('user.update');
		Route::post('/deleteavatar/{id}/{fileName}', [UserController::class, 'deleteavatar'])->name('user.deleteavatar');
	});

});


