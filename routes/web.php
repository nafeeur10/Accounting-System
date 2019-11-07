<?php
Route::redirect('/', '/admin/home');

Auth::routes(['register' => false]);

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'client'], function() {
    Route::get('/user-info', 'ClientController@userProfile')->name('user-info');
    Route::get('/user-edit/{id}', 'ClientController@editUserProfile')->name('client-user-edit');
    Route::put('/update-user/{user}', 'ClientController@update')->name('client-update');
    Route::get('/contact', 'ContactController@index')->name('contact');
    Route::get('/addContact', 'ContactController@create')->name('addContact');
    Route::post('saveContact', 'ContactController@store')->name('saveContact');
    Route::get('/showContact/{user}', 'ContactController@show')->name('contacts.show');
    Route::get('/edit/{user}', 'ContactController@edit')->name('contacts.edit');
    Route::put('/updateContact/{user}', 'ContactController@update')->name('contacts.update');
    Route::delete('/destroy/{user}', 'ContactController@destroy')->name('contacts.destroy');

    // Invoice

    Route::get('/outgoing', 'InvoiceController@index')->name('invoice');
    Route::get('/invoice/create/{user}', 'InvoiceController@create')->name('invoice-index');
    Route::get('/product/select/{id}', 'InvoiceController@select')->name('invoice.product.select');
    Route::post('/saveInvoice', 'InvoiceController@save')->name('saveInvoiceproducts');
    Route::post('/createInvoice', 'InvoiceController@createInvoice')->name('createInvoiceNumber');
    Route::get('/invoice', 'InvoiceController@invoice')->name('final-invoice');
    Route::get('/downloadPDF/{id}','InvoiceController@downloadPDF');
    // Route::get('/readInvoice', 'InvoiceController@read')->name('readInvoice');
    // Product

    Route::resource('product', 'ProductController');
    
});
