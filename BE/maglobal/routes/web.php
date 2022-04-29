<?php
    Route::get('/', 'HomeController@index')->name('home');
Route::redirect('/login', '/login');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
  
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

   
    //banners
    Route::delete('banner/destroy', 'BannerController@massDestroy')->name('banner.massDestroy');
    Route::resource('banner', 'BannerController');
    //media
    Route::get('media', 'MediaController@index')->name('media');

    //category
   Route::delete('category/destroy', 'CategoryController@massDestroy')->name('category.massDestroy');
   Route::resource('category', 'CategoryController');
   
    //blog
    Route::delete('blog/destroy', 'BlogController@massDestroy')->name('blog.massDestroy');
    Route::resource('blog', 'BlogController');
    //setting
    Route::delete('setting/destroy', 'SettingController@massDestroy')->name('setting.massDestroy');
    Route::resource('setting', 'SettingController');
    Route::resource('mail', 'MailController');
    Route::get('home', 'HomeController@index')->name('home');

    //contact
    Route::delete('contact/destroy', 'ContactController@massDestroy')->name('contact.massDestroy');
    Route::resource('contact', 'ContactController');
    //order
    Route::delete('order/destroy', 'OrderController@massDestroy')->name('order.massDestroy');
    Route::resource('order', 'OrderController');
     
      //abum
    Route::delete('abum/destroy', 'AbumController@massDestroy')->name('abum.massDestroy');
    Route::post('abum/media', 'AbumController@storeMedia')->name('abum.storeMedia');
    Route::get('abum/listMedia', 'AbumController@listMedia')->name('abum.listMedia');
    Route::resource('abum', 'AbumController');
    Route::post('abum/deleteMedia', 'AbumController@deleteMedia')->name('abum.deleteMedia');
       //gallery
       Route::post('gallery/media', 'GalleryController@storeMedia')->name('gallery.storeMedia');
       Route::delete('gallery/destroy', 'GalleryController@massDestroy')->name('gallery.massDestroy');
       Route::resource('gallery', 'GalleryController');
      
});

 Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });
 //contact
 Route::group(["prefix"=>"contact"],function() {
    Route::get('/', 'HomeController@contact')->name('contact');
    Route::post('/saveContact', 'ContactController@CreateContact');
});

 //review
 Route::group(["prefix"=>"review"],function() {
    Route::get('/', 'ReviewController@ListReview');
    Route::post('/saveReview', 'ReviewController@CreateReview')->name('renew.submit');
});
 //order
 Route::group(["prefix"=>"order"],function() {
    Route::post('/saveOrder', 'OrderController@CreateOrder')->name('order.submit');
});
//order
Route::group(["prefix"=>"subscribe"],function() {
    Route::post('/savesubscribe', 'SubcribleController@CreateSubcrible')->name('subscribe.submit');
});

Route::prefix('member')->group(function() {
    Route::get('/login','MemberController@showLoginForm')->name('member.login');
    Route::post('/login', 'MemberController@login')->name('member.login.submit');
    Route::get('logout/', 'MemberController@logout')->name('member.logout');
    Route::get('/register','MemberController@showRegisterForm')->name('member.register');
    Route::post('/register', 'MemberController@register')->name('member.register.submit');
    Route::get('/profile','MemberController@profile')->name('member.profile');
    Route::put('/update', 'MemberController@updateProfile')->name('member.update.submit');
    Route::post('/password/reset','MemberController@sendMailResetPassword')->name('member.password.submit');
    Route::get('/password/reset','MemberController@resetPassword')->name('member.password.reset');
    Route::post('/password/update','MemberController@UpdatePassword')->name('member.password.change.update');
    Route::get('/password/change/{token}','MemberController@ChangePassword')->name('member.password.change');
    Route::get('/order','MemberController@order')->name('member.order');
    });

Route::group(["prefix"=>"blog"],function() {
    Route::get('/', 'HomeController@blog');
    Route::get('/{id}/{slug}', 'HomeController@details');

});
Route::group(["prefix"=>"gallery"],function() {
    Route::get('/', 'HomeController@blog');
    Route::get('/{id}', 'HomeController@getGallery');

});
