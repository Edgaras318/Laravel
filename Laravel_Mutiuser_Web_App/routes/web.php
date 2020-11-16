<?php
use App\Http\Middleware\CheckIfAdmin;
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

//  Route::get('/', function () {
//      return view('/blogs');
//  });

    Route::get('/users', function () {
        return view('users',[
            'users' => App\User::take(3)->latest()->get()
        ]);

})->middleware(CheckIfAdmin::class, 'auth');
Route::resource('/blogs', 'BlogController');
Route::get('/', 'BlogController@index');
//Route::put('/blogs/{blog}', 'BlogController@update')->middleware('can:update,blog');
// Route::get('blogs', 'blogController@index')->name('blogs.index');
// Route::get('blogs/{blog}', 'blogController@show')->name('blogs.show');
// Route::post('blogs/{blog}/edit', 'blogController@edit')->name('blogs.edit');
// Route::post('blogs/{blog}', 'blogController@destroy')->name('blogs.destroy');
// Route::get('blogs/create', 'blogController@create')->name('blogs.create');
 //Route::post('blogs//{blog}', 'blogController@update')->middleware('can:update,blog');
// Route::post('blogs', 'blogController@store')->name('blogs.store');
Route::get('/downloadPDF/{id}','BlogController@downloadPDF');
//Route::get('blogs', 'blogController@downloadPDF')->name('blogs.downloadPDF');
Route::get('users/export/', 'UserController@export')->middleware(CheckIfAdmin::class, 'auth');

Auth::routes();
// Route::resource('/blogs', 'BlogController');
// Auth::routes();

//Route::get('/users', 'UserController@index');

Route::get('/user/profile', 'ProfileController@index');
Route::post('/user/profile', 'ProfileController@update_avatar');
// Route::prefix('admin')->group(function(){
//     Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin-login');
//     Route::post('/login','Auth\AdminLoginController@Login')->name('admin.login.submit');
//     Route::get('/', 'AdminController@index')->name('admin.dashboard');
// });

Auth::routes();

Route::get('/user/edit', 'ProfileController@edit')->name('user.edit');
Route::post('/user/update', 'ProfileController@update')->name('user.update');

Route::get('/user/password', 'ProfileController@passwordEdit')->name('user.password');
Route::post('/user/password', 'ProfileController@passwordUpdate')->name('user.passwordUpdate');

//Route::get('/users', function(){
    // if(Gate::allows('index', Auth::user())) {
     //   return view('/users');
    // }else{
    //     return "You are not an admin!";
    // }
//})->middleware(CheckIfAdmin::class);
