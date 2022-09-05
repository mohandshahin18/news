<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserAuthController;
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
    return view('welcome');
});


// for login
Route::prefix('cms/')->middleware('guest:admin,author')->group(function(){
    Route::get('{guard}/login', [UserAuthController::class , 'showlogin'])->name('login.view');
    Route::post('{guard}/login', [UserAuthController::class , 'login']);
});

Route::prefix('cms/admin/')->middleware('auth:admin,author')->group(function(){
    Route::get('logout', [UserAuthController::class , 'logout'])->name('cms.auth.logout');
    Route::get('profile/edit/admin', [UserAuthController::class , 'editAdminProfile'])->name('edit-profile-admin');
    Route::get('profile/edit/author', [UserAuthController::class , 'editAuhtorProfile'])->name('edit-profile-author');
    Route::get('index/author', [UserAuthController::class , 'indexAuthor'])->name('index-author');
    Route::get('create/article', [UserAuthController::class , 'createArticle'])->name('create-article');


});


Route::prefix('cms/admin/')->middleware('auth:admin,author')->group(function(){
    Route::view('','cms.parent');
    // Route::view('temp','cms.temp');

    Route::resource('countries',CountryController::class);

    Route::resource('cities',CityController::class);
    Route::post('update_cities/{id}', [CityController::class , 'update'])->name('update_cities');

    Route::resource('admins',AdminController::class);
    Route::post('update_admins/{id}', [AdminController::class , 'update'])->name('update_admins');
    Route::get('AdminCreate/{id}' , [AdminController::class] , 'AdminCreate')->name('AdminCreate');

    Route::resource('authors',AuthorController::class);
    Route::post('update_authors/{id}', [AuthorController::class , 'update'])->name('update_authors');

    Route::resource('categories',CategoryController::class);
    Route::post('update_categories/{id}', [CategoryController::class , 'update'])->name('update_categories');


    Route::resource('articles',ArticleController::class);
    Route::post('update_articles/{id}', [ArticleController::class , 'update'])->name('update_articles');
    Route::get('create/articles/{id}' , [ArticleController::class , 'createAritcle'])->name('createAritcle');
    Route::get('index/articles/{id}' , [ArticleController::class , 'indexArticle'])->name('indexArticle');


    Route::resource('roles',RoleController::class);
    Route::post('update_roles/{id}', [RoleController::class , 'update'])->name('update_roles');


    Route::resource('permissions',PermissionController::class);
    Route::post('update_permissions/{id}', [PermissionController::class , 'update'])->name('update_permissions');


    Route::resource('roles.permissions',RolePermissionController::class);




});
