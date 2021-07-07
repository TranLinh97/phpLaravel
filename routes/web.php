<?php

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
/*Route::get('/',function () {
   return view('welcome');
});*/

Route::group(['namespace' => 'Auth','prefix' => 'account'], function(){
    Route::get('register','RegisterController@getFormRegister')->name('get.register');
    Route::post('register','RegisterController@postRegister');

    Route::get('login','LoginController@getFormLogin')->name('get.login');
    Route::post('login','LoginController@postLogin');

    Route::get('logout','LoginController@getLogout')->name('get.logout');
    Route::get('reset-password','ResetPasswordController@getEmailReset')->name('get.email_reset_password');
    Route::post('reset-password','ResetPasswordController@checkEmailResetPassword');

    Route::get('new-password','ResetPasswordController@newPassword')->name('get.new_password');
    Route::post('new-password','ResetPasswordController@savePassword');
});


Route::group(['namespace'=>'Frontend'], function (){
   Route::get('','HomeController@index')->name('get.home');
   Route::get('san-pham','Productcontroller@index')->name('get.product.list');
   Route::get('san-pham/{slug}','ProductDetailController@getProductDetail')->name('get.product.detail');
   Route::get('danh-muc/{slug}','CategoryController@index')->name('get.category.list');

   Route::get('bai-viet','BlogController@index')->name('get.blog.home');
   Route::get('menu/{slug}','BlogMenuController@getArticleByMenu')->name('get.article.by_menu');
   Route::get('bai-viet/{slug}','ArticleDetailController@index')->name('get.blog.detail');

   /*Gio hang*/
   Route::get('don-hang','ShoppingCartController@index')->name('get.shopping.list');
   Route::prefix('shopping')->group(function (){
      Route::get('add/{id}','ShoppingCartController@add')->name('get.shopping.add');
      Route::get('update/{id}','ShoppingCartController@update')->name('ajax_get.shopping.update');
      Route::get('delete/{id}','ShoppingCartController@delete')->name('get.shopping.delete');
      Route::post('pay','ShoppingCartController@postPay')->name('post.shopping.pay');

   });
});
include 'route_admin.php';
include 'route_user.php';

/*Auth::routes();*/
Route::get('/home', 'HomeController@index')->name('get.home');
