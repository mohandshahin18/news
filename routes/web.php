<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CommerntController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\Website\HomeController;
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
    // Route::post('{guard}/login', [UserAuthController::class , 'login']);
    Route::post('admin/login', [UserAuthController::class , 'adminLogin'])->name('admin-login');
    Route::post('author/login', [UserAuthController::class , 'authorLogin'])->name('auhtor-login');
});

Route::prefix('cms/admin/')->middleware('auth:admin,author')->group(function(){
    Route::get('logout', [UserAuthController::class , 'logout'])->name('cms.auth.logout');
    Route::get('profile/edit/admin', [UserAuthController::class , 'editAdminProfile'])->name('edit-profile-admin');
    Route::get('profile/edit/author', [UserAuthController::class , 'editAuhtorProfile'])->name('edit-profile-author');
    Route::get('index/author', [UserAuthController::class , 'indexAuthor'])->name('index-author');
    Route::get('create/article', [UserAuthController::class , 'createArticle'])->name('create-article');
    Route::get('edit/password', [SettingController::class , 'editPassword'])->name('edit-password');
    Route::post('update/password', [SettingController::class , 'updatePassword'])->name('update-password');



});


Route::prefix('cms/admin/')->middleware('auth:admin,author')->group(function(){
    Route::view('','cms.home')->name('home');
    Route::view('profile','cms.profile')->name('profile');

    Route::resource('countries',CountryController::class);

    Route::resource('cities',CityController::class);
    Route::post('update_cities/{id}', [CityController::class , 'update'])->name('update_cities');
    Route::post('/cities/search',[CityController::class,'showCity'])->name('city.search');


    Route::resource('admins',AdminController::class);
    Route::post('update_admins/{id}', [AdminController::class , 'update'])->name('update_admins');
    Route::get('AdminCreate/{id}' , [AdminController::class] , 'AdminCreate')->name('AdminCreate');

    Route::resource('authors',AuthorController::class);
    Route::post('update_authors/{id}', [AuthorController::class , 'update'])->name('update_authors');

    Route::resource('categories',CategoryController::class);
    Route::post('update_categories/{id}', [CategoryController::class , 'update'])->name('update_categories');
    Route::post('/categories/search',[CategoryController::class,'showCategory'])->name('category.search');


    Route::resource('articles',ArticleController::class);
    Route::post('update_articles/{id}', [ArticleController::class , 'update'])->name('update_articles');
    Route::get('create/articles/{id}' , [ArticleController::class , 'createAritcle'])->name('createAritcle');
    Route::get('index/articles/{id}' , [ArticleController::class , 'indexArticle'])->name('indexArticle');


    Route::resource('roles',RoleController::class);
    Route::post('update_roles/{id}', [RoleController::class , 'update'])->name('update_roles');


    Route::resource('permissions',PermissionController::class);
    Route::post('update_permissions/{id}', [PermissionController::class , 'update'])->name('update_permissions');
    // Route::post('/permissions/search',[PermissionController::class,'showPermission'])->name('permission.search');


    Route::resource('roles.permissions',RolePermissionController::class);

    Route::resource('sliders',SliderController::class);
    Route::post('update_sliders/{id}', [SliderController::class , 'update'])->name('update_sliders');


    Route::get('contacts', [ContactController::class ,  'index'])->name('contacts.index');
    Route::post('/contacts/search',[ContactController::class,'showContact'])->name('contact.search');



});

Route::prefix('home/')->group(function(){

    Route::get('', [HomeController::class ,  'indexSlider'])->name('news.index');
    // Route::get('/{id}', [HomeController::class ,  'parent'])->name('parent');
    Route::get('news-detailes/{id}', [HomeController::class ,  'indexDetailes'])->name('news.detailes');
    Route::get('contact',[HomeController::class ,'contact'])->name('news.contact');
    Route::get('all-news',[HomeController::class ,'allNews'])->name('all-news');
    Route::get('profile',[HomeController::class ,'profile'])->name('profile.visitor')->middleware('auth:visitor');
    Route::get('update_profile/{id}', [HomeController::class , 'editProfile'])->middleware('auth:visitor'  );
    Route::post('update_profile/{id}', [HomeController::class , 'updateProfile'])->name('update_Profile_visitor')->middleware('auth:visitor');

    Route::post('contacts', [ContactController::class ,  'store']);
    Route::post('comments',[CommerntController::class ,'store'])->middleware('auth:visitor');
    Route::delete('comments/{id}',[CommerntController::class ,'destroy'])->middleware('auth:visitor');

    // ->middleware('auth:visitor')




});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
