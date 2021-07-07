<?php
    Route::group(['prefix'=>'account','namespace'=>'User','middleware'=>'check_user_login'],function (){
       Route::get('','UserDashboardController@dashboard')->name('get.user.dashboard');
       Route::get('update-info','UserInfoController@updateInfo')->name('get.user.update_info');
       Route::post('update-info','UserInfoController@saveUpdateInfo');

       Route::get('transaction','UserTransactionController@index')->name('get.user.transaction');
       Route::get('favourite','UserFavouriteController@index')->name('get.user.favourite');

       Route::post('ajax-favourite/{idProduct}','UserFavouriteController@addFavourite')->name('ajax_get.user.add_favourite');
       Route::get('favourite-delete/{id}','UserFavouriteController@delete')->name('get.user.favourite.delete');
    });
