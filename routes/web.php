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
| provider Section
|--------------------------------------------------------------------------
| this will handle all provider part
*/
Route::get('/providers','providersControllers@list')->name('providers');
Route::get('/provider/info/{id}','providersControllers@info')->name('provider.info')->where('id', '[0-9]+');
Route::get('/provider/status/{id}','providersControllers@status')->name('provider.status')->where('id', '[0-9]+')->middleware('role:provider,edit');
Route::get('/provider/status/beautyCenter/{id}','providersControllers@statusbeautyCenter')->name('provider.status.beautyCenter')->where('id', '[0-9]+')->middleware('role:provider,edit');
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
Route::get('/subcategor/info/{id}','subcategoiesController@info')->name('subcategor.info')->where('id', '[0-9]+');
Route::get('/subcategor/status/{id}','subcategoiesController@status')->name('subcategor.status')->where('id', '[0-9]+')->middleware('role:subcategor,edit');
Route::get('/subcategor/edit/{id}','subcategoiesController@formEdit')->name('subcategor.edit')->where('id', '[0-9]+')->middleware('role:subcategor,edit');
Route::post('/subcategor/edit/{id}','subcategoiesController@submitEdit')->name('subcategor.edit.submit')->where('id', '[0-9]+')->middleware('role:subcategor,edit');
Route::get('/subcategor/add','subcategoiesController@formAdd')->name('subcategor.add')->middleware('role:subcategor,add');
Route::post('/subcategor/add','subcategoiesController@submitAdd')->name('subcategor.add.submit')->middleware('role:subcategor,add');
#---

/*
|--------------------------------------------------------------------------
| shop levels Section
|--------------------------------------------------------------------------
| this will handle all shop levels part
*/
Route::get('/shop/levels','shopLevelsController@list')->name('shop.levels');
Route::get('/shop/level/info/{id}','shopLevelsController@info')->name('shop.level.info')->where('id', '[0-9]+');
Route::get('/shop/level/status/{id}','shopLevelsController@status')->name('shop.level.status')->where('id', '[0-9]+')->middleware('role:shop,edit');
Route::get('/shop/level/edit/{id}','shopLevelsController@formEdit')->name('shop.level.edit')->where('id', '[0-9]+')->middleware('role:shop,edit');
Route::post('/shop/level/edit/{id}','shopLevelsController@submitEdit')->name('shop.level.edit.submit')->where('id', '[0-9]+')->middleware('role:shop,edit');
Route::get('/shop/level/add','shopLevelsController@formAdd')->name('shop.level.add')->middleware('role:shop,add');
Route::post('/shop/level/add','shopLevelsController@submitAdd')->name('shop.level.add.submit')->middleware('role:shop,add');
#----------------------------------------------------------------------------------




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
//Route::get('/order/status/{id}','usersControllers@status')->name('user.status')->where('id', '[0-9]+')->middleware('role:users,edit');
#----------------------------------------------------------------------------------

/*
|--------------------------------------------------------------------------
| Balance recharging  Section
|--------------------------------------------------------------------------
| this will handle all Balance recharging part
*/
Route::get('/balance/recharging','balanceRechargingControllers@list')->name('Balance.recharging');
Route::get('/balance/recharging/info/{id}','balanceRechargingControllers@info')->name('Balance.recharging.info')->where('id', '[0-9]+');
Route::post('/balance/recharging/approve/{id}','balanceRechargingControllers@approve')->name('Balance.recharging.approve')->where('id', '[0-9]+')->middleware('role:Balance,edit');
Route::get('/balance/recharging/disapprove/{id}','balanceRechargingControllers@disapprove')->name('Balance.recharging.disapprove')->where('id', '[0-9]+')->middleware('role:Balance,edit');
#----------------------------------------------------------------------------------

/*
|--------------------------------------------------------------------------
| Bank account Section
|--------------------------------------------------------------------------
| this will handle all Bank account part
*/
Route::get('/Bank/account','bankAccountsController@list')->name('Bank.account');
Route::get('/Bank/account/info/{id}','bankAccountsController@info')->name('Bank.account.info')->where('id', '[0-9]+');
Route::get('/Bank/account/status/{id}','bankAccountsController@status')->name('Bank.account.status')->where('id', '[0-9]+')->middleware('role:Bank,edit');
Route::get('/Bank/account/edit/{id}','bankAccountsController@formEdit')->name('Bank.account.edit')->where('id', '[0-9]+')->middleware('role:Bank,edit');
Route::post('/Bank/account/edit/{id}','bankAccountsController@submitEdit')->name('Bank.account.edit.submit')->where('id', '[0-9]+')->middleware('role:Bank,edit');
Route::get('/Bank/account/add','bankAccountsController@formAdd')->name('Bank.account.add')->middleware('role:Bank,add');
Route::post('/Bank/account/add','bankAccountsController@submitAdd')->name('Bank.account.add.submit')->middleware('role:Bank,add');
#----------------------------------------------------------------------------------

/*
|--------------------------------------------------------------------------
| Notifications Section
|--------------------------------------------------------------------------
| this will handle all Notifications part
*/
Route::get('/Notifications','NotificationsController@list')->name('Notifications');
Route::get('/Notification/info/{id}','NotificationsController@info')->name('Notification.info')->where('id', '[0-9]+');
Route::get('/Notification/edit/{id}','NotificationsController@formEdit')->name('Notification.edit')->where('id', '[0-9]+')->middleware('role:Notification,edit');
Route::post('/Notification/edit/{id}','NotificationsController@submitEdit')->name('Notification.edit.submit')->where('id', '[0-9]+')->middleware('role:Notification,edit');
Route::get('/Notification/add','NotificationsController@formAdd')->name('Notification.add')->middleware('role:Notification,add');
Route::post('/Notification/add','NotificationsController@submitAdd')->name('Notification.add.submit')->middleware('role:Notification,add');
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
| Reports Orders
|--------------------------------------------------------------------------
| this will handle all Reports part
*/
Route::get('/reports','dashBoardController@report')->name('reports');
Route::get('/reports/search','dashBoardController@search')->name('reports.search');


Route::get('/home','dashBoardController@index')->name('dashboard');
Route::get('/','dashBoardController@index')->name('dashboard');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout.get');
});

Auth::routes(['register' => false, 'verify' => false]);

