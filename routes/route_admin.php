<?php
Route::group(['prefix'=>'admin-auth','namespace'=>'Admin\Auth'], function (){
    Route::get('login','AdminLoginController@getLoginAdmin')->name('get.login.admin');
    Route::post('login','AdminLoginController@postLoginAdmin');
    Route::get('logout','AdminLoginController@postLogoutAdmin')->name('get.logout.admin');
    });
Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::group(['prefix'=>'api-admin','namespace'=>'admin' ,'middleware'=>'check_admin_login'], function (){
    Route::get('/', function () {
        return view('admin.index');
//        return view('admin.dashboard');
    });
    Route::get('statistical','AdminStatisticalController@index')->name('admin.statistical');
    /*Route Danh Muc*/
    Route::group(['prefix'=>'category'], function (){
        Route::get('','AdminCategoryController@index')->name('admin.category.index');
        //tạo mới danh mục
        Route::get('create','AdminCategoryController@create')->name('admin.category.create');
        Route::post('create','AdminCategoryController@store');
        //update danh mục
        Route::get('update/{id}','AdminCategoryController@edit')->name('admin.category.update');
        Route::post('update/{id}','AdminCategoryController@update');
        //ẩn hiện danh mục active
        Route::get('active/{id}','AdminCategoryController@active')->name('admin.category.active');
        //ẩn hiện danh mục hot
        Route::get('hot/{id}','AdminCategoryController@hot')->name('admin.category.hot');
        //xóa danh mục
        Route::get('delete/{id}','AdminCategoryController@delete')->name('admin.category.delete');

    });

    /*Keyword*/
    Route::group(['prefix'=>'keyword'], function (){
        Route::get('','AdminKeywordController@index')->name('admin.keyword.index');
        //tạo mới
        Route::get('create','AdminKeywordController@create')->name('admin.keyword.create');
        Route::post('create','AdminKeywordController@store');
        //update
        Route::get('update/{id}','AdminKeywordController@edit')->name('admin.keyword.update');
        Route::post('update/{id}','AdminKeywordController@update');
        //ẩn hiện  hot
        Route::get('hot/{id}','AdminKeywordController@hot')->name('admin.keyword.hot');
        //xóa
        Route::get('delete/{id}','AdminKeywordController@delete')->name('admin.keyword.delete');

    });
    /*Attribute*/
    Route::group(['prefix'=>'attribute'], function (){
        Route::get('','AdminAttributeController@index')->name('admin.attribute.index');
        //tạo mới
        Route::get('create','AdminAttributeController@create')->name('admin.attribute.create');
        Route::post('create','AdminAttributeController@store');
        //update
        Route::get('update/{id}','AdminAttributeController@edit')->name('admin.attribute.update');
        Route::post('update/{id}','AdminAttributeController@update');
        //ẩn hiện  hot
        Route::get('hot/{id}','AdminAttributeController@hot')->name('admin.attribute.hot');
        //xóa
        Route::get('delete/{id}','AdminAttributeController@delete')->name('admin.attribute.delete');

    });
    /*User*/
    Route::group(['prefix'=>'user'], function (){
        Route::get('','AdminUserController@index')->name('admin.user.index');
        //update
        Route::get('update/{id}','AdminUserController@edit')->name('admin.user.update');
        Route::post('update/{id}','AdminUserController@update');
        //xóa
        Route::get('delete/{id}','AdminUserController@delete')->name('admin.user.delete');

    });

    /*Transaction*/
    Route::group(['prefix'=>'transaction'], function (){
        Route::get('','AdminTransactionController@index')->name('admin.transaction.index');
        //delete
        Route::get('delete/{id}','AdminTransactionController@delete')->name('admin.transaction.delete');
        //ajax detail transaction delete
        Route::get('order-delete/{id}','AdminTransactionController@deleteOrderItem')->name('ajax_admin.transaction.order_item');
        //ajax detail transaction
        Route::get('view-transaction/{id}','AdminTransactionController@getTransactionDetail')->name('ajax.admin.transaction.detail');
        //trang thai don hang
        Route::get('action/{action}/{id}','AdminTransactionController@getAction')->name('admin.action.transaction');
    });
    /*Product*/
    Route::group(['prefix' => 'product'], function(){
        Route::get('','AdminProductController@index')->name('admin.product.index');
        Route::get('create','AdminProductController@create')->name('admin.product.create');
        Route::post('create','AdminProductController@store');

        Route::get('update/{id}','AdminProductController@edit')->name('admin.product.update');
        Route::post('update/{id}','AdminProductController@update');
        //hot
        Route::get('hot/{id}','AdminProductController@hot')->name('admin.product.hot');
        //Active
        Route::get('active/{id}','AdminProductController@active')->name('admin.product.active');

        Route::get('delete/{id}','AdminProductController@delete')->name('admin.product.delete');

        Route::get('delete-image/{id}','AdminProductController@deleteImage')->name('admin.product.delete_image');
    });
    //Menu
    Route::group(['prefix'=>'menu'], function (){
        Route::get('','AdminMenuController@index')->name('admin.menu.index');
        //tạo mới danh mục
        Route::get('create','AdminMenuController@create')->name('admin.menu.create');
        Route::post('create','AdminMenuController@store');
        //update danh mục
        Route::get('update/{id}','AdminMenuController@edit')->name('admin.menu.update');
        Route::post('update/{id}','AdminMenuController@update');
        //ẩn hiện danh mục active
        Route::get('active/{id}','AdminMenuController@active')->name('admin.menu.active');
        //ẩn hiện danh mục hot
        Route::get('hot/{id}','AdminMenuController@hot')->name('admin.menu.hot');
        //xóa danh mục
        Route::get('delete/{id}','AdminMenuController@delete')->name('admin.menu.delete');

    });
    //Article
    Route::group(['prefix'=>'article'], function (){
        Route::get('','AdminArticleController@index')->name('admin.article.index');
        //tạo mới danh mục
        Route::get('create','AdminArticleController@create')->name('admin.article.create');
        Route::post('create','AdminArticleController@store');
        //update danh mục
        Route::get('update/{id}','AdminArticleController@edit')->name('admin.article.update');
        Route::post('update/{id}','AdminArticleController@update');
        //ẩn hiện danh mục active
        Route::get('active/{id}','AdminArticleController@active')->name('admin.article.active');
        //ẩn hiện danh mục hot
        Route::get('hot/{id}','AdminArticleController@hot')->name('admin.article.hot');
        //xóa danh mục
        Route::get('delete/{id}','AdminArticleController@delete')->name('admin.article.delete');

    });
    //Slide
    Route::group(['prefix'=>'slide'], function (){
        Route::get('','AdminSlideController@index')->name('admin.slide.index');
        //tạo mới danh mục
        Route::get('create','AdminSlideController@create')->name('admin.slide.create');
        Route::post('create','AdminSlideController@store');
        //update danh mục
        Route::get('update/{id}','AdminSlideController@edit')->name('admin.slide.update');
        Route::post('update/{id}','AdminSlideController@update');
        //ẩn hiện danh mục active
        Route::get('active/{id}','AdminSlideController@active')->name('admin.slide.active');
        //ẩn hiện danh mục hot
        Route::get('hot/{id}','AdminSlideController@hot')->name('admin.slide.hot');
        //xóa danh mục
        Route::get('delete/{id}','AdminSlideController@delete')->name('admin.slide.delete');

    });

    //Event
    Route::group(['prefix'=>'event'], function (){
        Route::get('','AdminEventController@index')->name('admin.event.index');
        //tạo mới danh mục
        Route::get('create','AdminEventController@create')->name('admin.event.create');
        Route::post('create','AdminEventController@store');
        //update danh mục
        Route::get('update/{id}','AdminEventController@edit')->name('admin.event.update');
        Route::post('update/{id}','AdminEventController@update');
        //xóa danh mục
        Route::get('delete/{id}','AdminEventController@delete')->name('admin.event.delete');

    });
});
