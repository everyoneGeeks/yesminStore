<?php



Route::group(['middleware' => ['auth'],'prefix'=>'admin'], function() {


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
| partyTheme Section
|--------------------------------------------------------------------------
| this will handle all partyTheme part
*/
Route::get('/partyThemes','partyThemeControler@list')->name('partyThemes');
Route::get('/partyTheme/info/{id}','partyThemeControler@info')->name('partyTheme.info')->where('id', '[0-9]+');
Route::get('/partyTheme/status/{id}','partyThemeControler@status')->name('partyTheme.status')->where('id', '[0-9]+')->middleware('role:partyTheme,edit');
Route::get('/partyTheme/edit/{id}','partyThemeControler@formEdit')->name('partyTheme.edit')->where('id', '[0-9]+')->middleware('role:partyTheme,edit');
Route::post('/partyTheme/edit/{id}','partyThemeControler@submitEdit')->name('partyTheme.edit.submit')->where('id', '[0-9]+')->middleware('role:partyTheme,edit');
Route::get('/partyTheme/add','partyThemeControler@formAdd')->name('partyTheme.add')->middleware('role:partyTheme,add');
Route::post('/partyTheme/add','partyThemeControler@submitAdd')->name('partyTheme.add.submit')->middleware('role:partyTheme,add');
Route::get('/partyTheme/delete/{id}','partyThemeControler@delete')->name('partyTheme.delete')->middleware('role:partyTheme,add');
#----------------------------------------------------------------------------------




/*
|--------------------------------------------------------------------------
| characters Section
|--------------------------------------------------------------------------
| this will handle all characters part
*/
Route::get('/characters','charactersControler@list')->name('characters');
Route::get('/characters/info/{id}','charactersControler@info')->name('characters.info')->where('id', '[0-9]+');
Route::get('/characters/status/{id}','charactersControler@status')->name('characters.status')->where('id', '[0-9]+')->middleware('role:characters,edit');
Route::get('/characters/edit/{id}','charactersControler@formEdit')->name('characters.edit')->where('id', '[0-9]+')->middleware('role:characters,edit');
Route::post('/characters/edit/{id}','charactersControler@submitEdit')->name('characters.edit.submit')->where('id', '[0-9]+')->middleware('role:characters,edit');
Route::get('/characters/add','charactersControler@formAdd')->name('characters.add')->middleware('role:characters,add');
Route::post('/characters/add','charactersControler@submitAdd')->name('characters.add.submit')->middleware('role:characters,add');
Route::get('/characters/delete/{id}','charactersControler@delete')->name('characters.delete')->middleware('role:characters,add');
#----------------------------------------------------------------------------------


/*
|--------------------------------------------------------------------------
| characters Section
|--------------------------------------------------------------------------
| this will handle all characters part
*/
Route::get('/occasion','occasionControler@list')->name('occasion');
Route::get('/occasion/info/{id}','occasionControler@info')->name('occasion.info')->where('id', '[0-9]+');
Route::get('/occasion/status/{id}','occasionControler@status')->name('occasion.status')->where('id', '[0-9]+')->middleware('role:occasion,edit');
Route::get('/occasion/edit/{id}','occasionControler@formEdit')->name('occasion.edit')->where('id', '[0-9]+')->middleware('role:occasion,edit');
Route::post('/occasion/edit/{id}','occasionControler@submitEdit')->name('occasion.edit.submit')->where('id', '[0-9]+')->middleware('role:occasion,edit');
Route::get('/occasion/add','occasionControler@formAdd')->name('occasion.add')->middleware('role:occasion,add');
Route::post('/occasion/add','occasionControler@submitAdd')->name('occasion.add.submit')->middleware('role:occasion,add');
Route::get('/occasion/delete/{id}','occasionControler@delete')->name('occasion.delete')->middleware('role:occasion,add');
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




/*
|--------------------------------------------------------------------------
| costomer Photo  Section
|--------------------------------------------------------------------------
| this will handle all ads part
*/
Route::get('/costomers','costomerPhotoController@list')->name('costomers');
Route::get('/costomer/status/{id}','costomerPhotoController@status')->name('costomer.status')->where('id', '[0-9]+')->middleware('role:ad,edit');
Route::get('/costomer/edit/{id}','costomerPhotoController@formEdit')->name('costomer.edit')->where('id', '[0-9]+')->middleware('role:ad,edit');
Route::post('/costomer/edit/{id}','costomerPhotoController@submitEdit')->name('costomer.edit.submit')->where('id', '[0-9]+')->middleware('role:ad,edit');
Route::get('/costomer/add','costomerPhotoController@formAdd')->name('costomer.add')->middleware('role:ad,add');
Route::post('/costomer/add','costomerPhotoController@submitAdd')->name('costomer.add.submit')->middleware('role:ad,add');




/*
|--------------------------------------------------------------------------
| costomersRate Section
|--------------------------------------------------------------------------
| this will handle all ads part
*/
Route::get('/costomersRate','costomerRateController@list')->name('costomersRate');
Route::get('/costomersRate/status/{id}','costomerRateController@status')->name('costomersRate.status')->where('id', '[0-9]+')->middleware('role:ad,edit');
Route::get('/costomersRate/edit/{id}','costomerRateController@formEdit')->name('costomersRate.edit')->where('id', '[0-9]+')->middleware('role:ad,edit');
Route::post('/costomersRate/edit/{id}','costomerRateController@submitEdit')->name('costomersRate.edit.submit')->where('id', '[0-9]+')->middleware('role:ad,edit');
Route::get('/costomersRate/add','costomerRateController@formAdd')->name('costomersRate.add')->middleware('role:ad,add');
Route::post('/costomersRate/add','costomerRateController@submitAdd')->name('costomersRate.add.submit')->middleware('role:ad,add');



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
Route::get('/dashboard','dashBoardController@index')->name('dashboard');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout.get');
});

Auth::routes(['register' => false, 'verify' => false]);
/*
|--------------------------------------------------------------------------
|  website  
|--------------------------------------------------------------------------
|
| this will handle all  website
*/


Route::get('/404','website\homePageController@not_found')->name('error');

//change lang
Route::get('/lang/{locale}', function ($locale) {
    $lang=['ar','en'];
    if(in_array($locale,$lang)){
        session(['language' =>$locale]);
        App::setLocale($locale);
        return redirect()->back();

    }else{
      return  redirect('/404');
    }
});
//Home page 
Route::get('/','website\homePageController@index')->name('homePage');

Route::get('/category/{id}','website\categoriesController@subCategories')->name('subcategorys');
Route::get('/products/{id}','website\productConroller@products')->name('product.subcategories');
Route::get('/products/occasion/{id}','website\productConroller@products_occasion')->name('product.products_occasion');
Route::get('/products/party/theme/{id}','website\productConroller@products_party_theme')->name('product.products_party_theme');
Route::get('/products/characters/{id}','website\productConroller@products_characters')->name('product.products_characters');
Route::get('/products','website\productConroller@Allproducts')->name('product.Allproducts');
Route::get('/product/info/{id}','website\productConroller@productInfo')->name('product.info');
Route::get('/product/search','website\productConroller@search_product')->name('product.search');



Route::get('/faq','website\homePageController@faq')->name('faq');

Route::get('/contact/us/','website\homePageController@contactus')->name('contactus');
Route::get('/about/us/','website\homePageController@aboutus')->name('aboutus');
Route::get('/policy','website\homePageController@policy')->name('policy');
Route::get('/delivery/returns','website\homePageController@deliveryReturns')->name('deliveryReturns');





Route::group(['middleware' => 'UserRedirectIfAuthenticated'], function () {
    Route::get('/signin','website\authenticationController@loginForm')->name('loginForm');
    Route::post('/signin/submit','website\authenticationController@loginSubmit')->name('loginSubmit');
    Route::get('/signup','website\authenticationController@registerForm')->name('registerForm');
Route::post('/signup/submit','website\authenticationController@registerSbmit')->name('registerSbmit');
Route::get('/forgetPassword','website\authenticationController@forgetPasswordForm')->name('forgetPasswordForm');
Route::post('/forgetPassword/submit','website\authenticationController@forgetPasswordSubmit')->name('forgetPasswordSubmit');
Route::get('/getPassword/{token}','website\authenticationController@getPassword')->name('getPassword');
Route::post('/updatePassword/submit','website\authenticationController@updatePassword')->name('updatePassword');


});


Route::get('/user/logout','website\authenticationController@logout')->name('logout');

Route::group(['middleware' => 'User'], function () {


Route::get('/profile','website\UserController@info')->name('info');
Route::get('/address','website\UserController@address')->name('address');
Route::post('/profile/update','website\UserController@editSubmit')->name('editSubmit');
Route::get('/address','website\UserController@address')->name('address');
Route::post('/address/add','website\UserController@addAddress')->name('addAddress');
Route::post('/address/update/{id}','website\UserController@updateAddress')->name('updateAddress');
Route::get('/address/delete/{id}','website\UserController@deleteAddress')->name('deleteAddress');

Route::get('/wishlist','website\wishListController@wishList')->name('wishList');
Route::get('/wishlist/add/{id}','website\wishListController@addWishList')->name('addWishList');
Route::get('/wishlist/delete/{id}','website\wishListController@deleteWishList')->name('deleteWishList');

Route::get('/cart','website\CartController@cart')->name('cart');
Route::get('/cart/add/{id}','website\CartController@addCart')->name('addCart');

Route::get('/product/add/cart/{id}','website\CartController@addProductCartFast')->name('addProductCartFast');



Route::get('/cart/update/{id}','website\CartController@updateProductcart')->name('updateCart');
Route::get('/cart/delete/{id}','website\CartController@deleteCart')->name('deleteCart');
Route::get('/cart/personalize/','website\CartController@addPersonalize')->name('addPersonalize');
Route::get('/checkout','website\CartController@shippingCart')->name('shippingCart');
Route::get('/payment','website\CartController@paymentCart')->name('paymentCart');
Route::get('/add/address/cart','website\CartController@addAddressCart')->name('addAddressCart');
Route::get('/address/cart','website\CartController@AddressCart')->name('AddressCart');

Route::get('/add/order','website\CartController@AddOrderCart')->name('AddOrderCart');

Route::get('/order/cart/{id}','website\CartController@orderCart')->name('orderCart');

Route::get('/orders','website\OrderController@orders')->name('orders');
Route::get('/shipping/cities/{id}','website\CartController@shippingCities')->name('shippingCities');
Route::get('/shipping/cost/{id}','website\CartController@shippingCost')->name('shippingCost');

Route::get('/add/coupon/','website\CartController@addCoupon')->name('addCoupon');

Route::get('/product/update/rate/{id}','website\OrderController@productRateUdpate')->name('productRateUdpate');
Route::get('/product/rate/{id}','website\OrderController@productRate')->name('productRate');

Route::get('/product/complaint/{order}/{product}','website\OrderController@productComplaint')->name('productComplaint');


});