<?php



Route::group(['middleware' => ['auth']], function() {


/*
|--------------------------------------------------------------------------
| User Section
|--------------------------------------------------------------------------
| this will handle all user part
*/
Route::get('/users','usersControllers@list')->name('users');
Route::get('/user/info/{id}','usersControllers@info')->name('user.info')->where('id', '[0-9]+');
Route::get('/user/status/{id}','usersControllers@status')->name('user.status')->where('id', '[0-9]+')->middleware('role:users,edit');
#----------------------------------------------------------------------------------


/*
|--------------------------------------------------------------------------
| category Section
|--------------------------------------------------------------------------
| this will handle all category part
*/
Route::get('/categories','categoriesController@list')->name('categories');
Route::get('/category/info/{id}','categoriesController@info')->name('category.info')->where('id', '[0-9]+');
Route::get('/category/status/{id}','categoriesController@status')->name('category.status')->where('id', '[0-9]+')->middleware('role:category,edit');
Route::get('/category/edit/{id}','categoriesController@formEdit')->name('category.edit')->where('id', '[0-9]+')->middleware('role:category,edit');
Route::post('/category/edit/{id}','categoriesController@submitEdit')->name('category.edit.submit')->where('id', '[0-9]+')->middleware('role:category,edit');
Route::get('/category/add','categoriesController@formAdd')->name('category.add')->middleware('role:category,add');
Route::post('/category/add','categoriesController@submitAdd')->name('category.add.submit')->middleware('role:category,add');
#----------------------------------------------------------------------------------


/*
|--------------------------------------------------------------------------
| subcategor Section
|--------------------------------------------------------------------------
| this will handle all subcategor part
*/
Route::get('/subcategoies','subcategoiesController@list')->name('subcategoies');
Route::get('/subcategory/info/{id}','subcategoiesController@info')->name('subcategory.info')->where('id', '[0-9]+');
Route::get('/subcategory/status/{id}','subcategoiesController@status')->name('subcategory.status')->where('id', '[0-9]+')->middleware('role:subcategor,edit');
Route::get('/subcategory/edit/{id}','subcategoiesController@formEdit')->name('subcategory.edit')->where('id', '[0-9]+')->middleware('role:subcategor,edit');
Route::post('/subcategory/edit/{id}','subcategoiesController@submitEdit')->name('subcategory.edit.submit')->where('id', '[0-9]+')->middleware('role:subcategor,edit');
Route::get('/subcategory/add','subcategoiesController@formAdd')->name('subcategory.add')->middleware('role:subcategor,add');
Route::post('/subcategory/add','subcategoiesController@submitAdd')->name('subcategory.add.submit')->middleware('role:subcategor,add');
Route::get('/subcategory/delete/{id}','subcategoiesController@deleteSubcategory')->name('subcategory.delete')->where('id', '[0-9]+');




/*
|--------------------------------------------------------------------------
| admin Section
|--------------------------------------------------------------------------
| this will handle all admin  part
*/
Route::group(['middleware' => 'superAdmin'], function()
{
    Route::get('/admins','adminsController@list')->name('admins');
    Route::get('/admin/info/{id}','adminsController@info')->name('admin.info')->where('id', '[0-9]+');
    Route::get('/admin/permission/{id}','adminsController@status')->name('admin.permission')->where('id', '[0-9]+');
    Route::get('/admin/edit/{id}','adminsController@formEdit')->name('admin.edit')->where('id', '[0-9]+');
    Route::post('/admin/edit/{id}','adminsController@submitEdit')->name('admin.edit.submit')->where('id', '[0-9]+');
    Route::get('/admin/add','adminsController@formAdd')->name('admin.add');
    Route::get('/admin/delete/{id}','adminsController@delete')->name('admin.delete');
    Route::post('/admin/add','adminsController@submitAdd')->name('admin.add.submit');
});
#----------------------------------------------------------------------------------


/*
|--------------------------------------------------------------------------
| User Orders
|--------------------------------------------------------------------------
| this will handle all orders part
*/
Route::get('/orders','ordersController@list')->name('orders');
Route::get('/order/info/{id}','ordersController@info')->name('order.info')->where('id', '[0-9]+');
Route::get('/order/status/{id}','usersControllers@status')->name('user.status')->where('id', '[0-9]+')->middleware('role:users,edit');
#----------------------------------------------------------------------------------


/*
|--------------------------------------------------------------------------
| products Section
|--------------------------------------------------------------------------
| this will handle all products part
*/
Route::get('/products','productsController@list')->name('products');
Route::get('/product/info/{id}','productsController@info')->name('product.info')->where('id', '[0-9]+');
Route::get('/product/edit/{id}','productsController@formEdit')->name('product.edit')->where('id', '[0-9]+')->middleware('role:product,edit');
Route::post('/product/edit/{id}','productsController@submitEdit')->name('product.edit.submit')->where('id', '[0-9]+')->middleware('role:product,edit');

Route::post('/product/delete/image/{id}','productsController@uploadProductImage')->name('product.delete.image')->where('id', '[0-9]+')->middleware('role:product,edit');

Route::post('/product/add/image/{id}','productsController@uploadProductImage')->name('product.add.image')->where('id', '[0-9]+')->middleware('role:product,edit');


Route::get('/product/add','productsController@formAdd')->name('product.add')->middleware('role:product,add');
Route::post('/product/add','productsController@submitAdd')->name('product.add.submit')->middleware('role:product,add');
Route::get('/product/delete/{id}','productsController@deleteProduct')->name('product.delete.submit')->middleware('role:product,add');


#----------------------------------------------------------------------------------


/*
|--------------------------------------------------------------------------
| appSetting Section
|--------------------------------------------------------------------------
| this will handle all appSetting part
*/
Route::get('/appSetting','appSettingController@formEdit')->name('appSetting');//->middleware('role:appSetting,edit');
Route::post('/appSetting/edit','appSettingController@submitEdit')->name('appSetting.edit');//->middleware('role:appSetting,edit');

 Route::get('/phone/edit/{id}','appSettingController@formEditPhone')->name('phone.edit');//->middleware('role:appSetting,edit');
Route::post('/phone/edit/{id}','appSettingController@submitEditPhone')->name('phone.edit.submit')->middleware('role:appSetting,edit');
Route::get('/phone/delete/{id}','appSettingController@deletePhone')->name('phone.delete');//->middleware('role:appSetting,edit');

Route::get('/phone/add','appSettingController@formAddPhone')->name('phone.add');//->middleware('role:appSetting,edit');
Route::post('/phone/add','appSettingController@submitAddPhone')->name('phone.add.submit');//->middleware('role:appSetting,edit');


Route::get('/email/edit/{id}','appSettingController@formEditEmail')->name('email.edit');//->middleware('role:appSetting,edit');
Route::post('/email/edit/{id}','appSettingController@submitEditEmail')->name('email.edit.submit')->middleware('role:appSetting,edit');
Route::get('/email/delete/{id}','appSettingController@deleteEmail')->name('email.delete');//->middleware('role:appSetting,edit');

Route::get('/email/add','appSettingController@formAddEmail')->name('email.add')->middleware('role:appSetting,edit');
Route::post('/email/add','appSettingController@submitAddEmail')->name('email.add.submit')->middleware('role:appSetting,edit');


#----------------------------------------------------------------------------------


/*
|--------------------------------------------------------------------------
| complains Section
|--------------------------------------------------------------------------
| this will handle all complains part
*/
Route::get('/complains','complainsController@list')->name('complains');
Route::post('/complains/info/{id}','complainsController@info')->name('complains.info');
#----------------------------------------------------------------------------------


/*
|--------------------------------------------------------------------------
| ads Section
|--------------------------------------------------------------------------
| this will handle all ads part
*/
Route::get('/ads','Advertisements@list')->name('ads');
Route::get('/ad/status/{id}','Advertisements@status')->name('ad.status')->where('id', '[0-9]+')->middleware('role:ad,edit');
Route::get('/ad/edit/{id}','Advertisements@formEdit')->name('ad.edit')->where('id', '[0-9]+')->middleware('role:ad,edit');
Route::post('/ad/edit/{id}','Advertisements@submitEdit')->name('ad.edit.submit')->where('id', '[0-9]+')->middleware('role:ad,edit');
Route::get('/ad/add','Advertisements@formAdd')->name('ad.add')->middleware('role:ad,add');
Route::post('/ad/add','Advertisements@submitAdd')->name('ad.add.submit')->middleware('role:ad,add');
#----------------------------------------------------------------------------------

/*
|--------------------------------------------------------------------------
| codes Section
|--------------------------------------------------------------------------
| this will handle all codes part
*/
Route::get('/codes','codeController@list')->name('codes');
Route::get('/code/status/{id}','codeController@status')->name('code.status')->where('id', '[0-9]+')->middleware('role:code,edit');
Route::get('/code/edit/{id}','codeController@formEdit')->name('code.edit')->where('id', '[0-9]+')->middleware('role:code,edit');
Route::post('/code/edit/{id}','codeController@submitEdit')->name('code.edit.submit')->where('id', '[0-9]+')->middleware('role:code,edit');
Route::get('/code/add','codeController@formAdd')->name('code.add')->middleware('role:code,add');
Route::post('/code/add','codeController@submitAdd')->name('code.add.submit')->middleware('role:code,add');
#----------------------------------------------------------------------------------


/*
|--------------------------------------------------------------------------
|  dashboard system
|--------------------------------------------------------------------------
|  
| this will handle all   dashboard system 
*/

Route::get('/home','dashBoardController@index')->name('dashboard');
Route::get('/','dashBoardController@index')->name('dashboard');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout.get');
});

Auth::routes(['register' => false, 'verify' => false]);

