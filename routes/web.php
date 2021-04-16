<?php



Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password/change', 'HomeController@changePassword')->name('password.change');
Route::post('/password/update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');


//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
// Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');



//Admin Category
// categories

Route::get('admin/categories','Admin\Category\CategoryController@category')->name('categories');
Route::post('admin/store/category','Admin\Category\CategoryController@storecategory')->name('store.category');
Route::get('delete/category/{id}','Admin\Category\CategoryController@DeleteCategory');
Route::get('edit/category/{id}','Admin\Category\CategoryController@EditCategory');
Route::post('update/category/{id}','Admin\Category\CategoryController@UpdateCategory');

// Brands admin routes
Route::get('admin/brands','Admin\Brand\BrandController@brand')->name('brands');
Route::post('admin/store/brand','Admin\Brand\BrandController@storebrand')->name('store.brand');
Route::get('delete/brand/{id}','Admin\Brand\BrandController@DeleteBrand');
Route::get('edit/brand/{id}','Admin\Brand\BrandController@EditBrand');
Route::post('update/brand/{id}','Admin\Brand\BrandController@UpdateBrand');

// Sub Categories
Route::get('admin/sub/category','Admin\SubCategory\SubCategoryController@subcategory')->name('sub.categories');
Route::post('admin/store/subcategory','Admin\SubCategory\SubCategoryController@storesubcategory')->name('store.subcategory');
Route::get('delete/subcategory/{id}','Admin\SubCategory\SubCategoryController@DeleteSubcat');
Route::get('edit/subcategory/{id}','Admin\SubCategory\SubCategoryController@EditSubcat');
Route::post('update/subcategory/{id}','Admin\SubCategory\SubCategoryController@UpdateSubcat');

// Admin Cupons routes
Route::get('admin/cupon','Admin\Cupon\CuponController@cupon')->name('admin.cupon');
Route::post('admin/store/cupon','Admin\Cupon\CuponController@storecupon')->name('store.cupon');
Route::get('delete/cupon/{id}','Admin\Cupon\CuponController@DeleteCupon');
Route::get('edit/cupon/{id}','Admin\Cupon\CuponController@EditCupon');
Route::post('update/cupon/{id}','Admin\Cupon\CuponController@UpdateCupon');


// Newslater for Admin
Route::get('admin/newslater/','Admin\Cupon\NewslaterController@newslater')->name('admin.newslater');
Route::get('delete/newslater/{id}','Admin\Cupon\NewslaterController@DeleteNews');
Route::get('admin/seo', 'Admin\Cupon\CuponController@Seo')->name('admin.seo');
Route::post('admin/update/seo', 'Admin\Cupon\CuponController@UpdateSeo')->name('update.seo');

// Admin Products for products
Route::get('admin/product/all','Admin\ProductController@index')->name('all.product');
Route::get('admin/product/add','Admin\ProductController@create')->name('add.product');
Route::post('admin/store/product','Admin\ProductController@store')->name('store.product');
Route::get('inactive/product/{id}','Admin\ProductController@Inactive');
Route::get('active/product/{id}','Admin\ProductController@Active');
Route::get('delete/product/{id}','Admin\ProductController@DeleteProduct');
Route::get('view/product/{id}','Admin\ProductController@ViewProduct');
Route::get('edit/product/{id}','Admin\ProductController@EditProduct');
Route::post('update/product/withoutphoto/{id}','Admin\ProductController@UpdateProductWithoutPhoto');
Route::post('update/product/photo/{id}','Admin\ProductController@UpdateProductPhoto');



// Admin Blog Post Routes

Route::get('admin/post/categories','Admin\PostCategoryController@postcategory')->name('postcategory');
Route::post('admin/store/post/category','Admin\PostCategoryController@storepostcategory')->name('store.postcategory');
Route::get('delete/postcategory/{id}','Admin\PostCategoryController@DeletePostCategory');
Route::get('edit/postcategory/{id}','Admin\PostCategoryController@EditPostCategory');
Route::post('update/postcategory/{id}','Admin\PostCategoryController@UpdatePostCategory');


Route::get('admin/post/add','Admin\PostCategoryController@createpost')->name('add.blogpost');
Route::get('admin/post/all','Admin\PostCategoryController@index')->name('all.blogpost');
Route::post('admin/store/post/','Admin\PostCategoryController@storepost')->name('store.post');
Route::get('delete/post/{id}','Admin\PostCategoryController@DeletePost');
Route::get('edit/post/{id}','Admin\PostCategoryController@EditPost');
Route::post('update/post/{id}','Admin\PostCategoryController@UpdatePost');



// Admin Order Route

Route::get('admin/pending/order/','Admin\OrderController@NewOrder')->name('admin.neworder');
Route::get('admin/view/order/{id}','Admin\OrderController@ViewOrder');
Route::get('admin/payment/accept/{id}', 'Admin\OrderController@PaymentAccept');
Route::get('admin/payment/cancel/{id}', 'Admin\OrderController@PaymentCancel');
Route::get('admin/accept/payment', 'Admin\OrderController@AcceptPaymentOrder')->name('admin.accept.payment');
Route::get('admin/progress/payment', 'Admin\OrderController@ProgressPaymentOrder')->name('admin.progress.payment');
Route::get('admin/success/payment', 'Admin\OrderController@SuccessPaymentOrder')->name('admin.success.payment');
Route::get('admin/cancel/payment', 'Admin\OrderController@CancelPaymentOrder')->name('admin.cancel.order');
Route::get('admin/delevery/progress/{id}', 'Admin\OrderController@DeleveryProgress');
Route::get('admin/delevery/done/{id}', 'Admin\OrderController@DeleveryDone');











// Admin Reports Route
Route::get('admin/today/order', 'Admin\ReportController@TodayOrder')->name('today.order');
Route::get('admin/today/deleverd', 'Admin\ReportController@TodayDelevered')->name('today.delevered');
Route::get('admin/this/month', 'Admin\ReportController@ThisMonth')->name('this.month');
Route::get('admin/search/report', 'Admin\ReportController@search')->name('search.report');
Route::post('admin/search/byyear', 'Admin\ReportController@searchByYear')->name('search.by.year');
Route::post('admin/search/bymonth', 'Admin\ReportController@searchByMonth')->name('search.by.month');
Route::post('admin/search/bydate', 'Admin\ReportController@searchByDate')->name('search.by.date');


// Admin User Controll Routes
Route::get('admin/user/role', 'Admin\UserroleController@UserRole')->name('create.user.role');
Route::get('admin/create/admin', 'Admin\UserroleController@UserCreate')->name('create.admin');
Route::post('admin/store/admin', 'Admin\UserroleController@UserStore')->name('store.admin');
Route::get('delete/admin/{id}', 'Admin\UserroleController@UserDelete');
Route::get('edit/admin/{id}', 'Admin\UserroleController@UserEdit');
Route::post('admin/update/admin', 'Admin\UserroleController@UserUpdate')->name('update.admin');



// Admin Return Product Request
Route::get('admin/update/admin', 'Admin\ReturnController@request')->name('admin.return.request');
Route::get('admin/approve/return/{id}', 'Admin\ReturnController@ApproveRequest');
Route::get('admin/request/all/return/', 'Admin\ReturnController@AllReturn')->name('admin.request.allreturn');


//stock
Route::get('admin/product/stock', 'Admin\StockController@Stock')->name('admin.product.stock');


//site setting
Route::get('admin/site/setting', 'Admin\SiteSettingController@SiteSetting')->name('admin.site.setting');
Route::post('admin/update/sitesetting', 'Admin\SiteSettingController@UpdateSetting')->name('update.sitesetting');

Route::get('admin/developer/setting', 'Admin\SiteSettingController@Developer')->name('admin.developer.setting');
Route::post('admin/store/developer', 'Admin\SiteSettingController@StoreDeveloper')->name('store.developer');
Route::get('admin/all/developer', 'Admin\SiteSettingController@AllDeveloper')->name('admin.all.developer');
Route::get('delete/developer/{id}', 'Admin\SiteSettingController@DeleteDeveloper');
Route::get('edit/developer/{id}', 'Admin\SiteSettingController@EditDeveloper');
Route::post('update/developer/{id}', 'Admin\SiteSettingController@UpdateDeveloper');


// Admin Database Back up
Route::get('admin/database/backup', 'Admin\SiteSettingController@DatabaseBackup')->name('admin.database.backup');
Route::get('admin/database/backup/now', 'Admin\SiteSettingController@BackupNow')->name('admin.backup.now');
Route::get('delete/database/{getFilename}', 'Admin\SiteSettingController@DeleteDatabase');
Route::get('{getFilename}', 'Admin\SiteSettingController@DownloadDatabase');


// Admin user Contact Message Route

Route::get('admin/user/contact/message/','Admin\ContactController@AllContact')->name('admin.contact.allmessage');

// Get PRoduct subcategory for ajax
Route::get('get/subcategory/{category_id}','Admin\ProductController@GetSubcat');

Route::get('get/settings/shiping/{shiping}','Admin\ProductController@GetShip');



// Wishlist routes
Route::get('add/wishlist/{id}','WishlistController@AddWishlist');
Route::get('remove/wishlist/{rowId}','WishlistController@RemoveWishlist');

// Add to Cart routes

Route::post('/cart/product/add/{id}','CartController@AddWislistCart');


Route::get('/add/to/cart/{id}','CartController@AddCart');
Route::get('check','CartController@check');
Route::get('product/cart/','CartController@showCart')->name('show.cart');
Route::get('remove/cart/{rowId}','CartController@removeCart');
Route::post('update/cart/item','CartController@UpdateCart')->name('update.cartitem');
Route::post('insert/into/cart/','CartController@InsertCart')->name('insert.into.cart');
Route::get('user/checkout/','CartController@Checkout')->name('user.checkout');
Route::get('user/wishlist/','CartController@Wishlist')->name('user.wishlist');
Route::post('user/apply/coupon/','CartController@Coupon')->name('apply.coupon');
Route::get('coupon/remove/','CartController@CouponRemove')->name('coupon.remove');


// Payment Process
Route::post('user/payment/process/','PaymentController@payment')->name('payment.process');

// Route::post('user/payment/process/charge/bkash','PaymentController@BkashCharge')->name('bkash.charge');
// Route::post('user/payment/process/charge/rocket','PaymentController@RocketCharge')->name('rocket.charge');
// Route::post('user/payment/process/charge/nagad','PaymentController@NagadCharge')->name('nagad.charge');

Route::get('success/orderlist', 'PaymentController@SuccessList')->name('success.orderlist');
Route::get('request/return/{id}', 'PaymentController@RequestReturn');


// Blog Routes
Route::get('blog/post/','BlogController@blog')->name('blog.post');
Route::get('blog/post/lang/english/','BlogController@English')->name('language.english');
Route::get('blog/post/lang/bangla/','BlogController@Bangla')->name('language.bangla');
Route::get('post/details/{id}','BlogController@PostDetails');


// Frontend  all routes are here
Route::post('store/newslater','Frontend\Newslater\NewslaterController@StoreNewslater')->name('store.newslater');

Route::get('show/tracking/','Frontend\Newslater\NewslaterController@ShowTracking');
Route::post('order/tracking/','Frontend\Newslater\NewslaterController@OrderTracking')->name('order.tracking');

Route::post('product/search/','Frontend\Newslater\NewslaterController@ProductSearch')->name('product.search');


// Customer profile related routes
Route::get('/product/details/{id}/{product_name}','ProductController@ProductView');
Route::post('/cart/product/add/{id}','ProductController@AddCart');
Route::get('cart/product/view/{id}','ProductController@ViewProduct');
Route::get('/products/{id}','ProductController@ProductViewShop');


Route::post('/cart/product/add/search/{id}','ProductController@AddCartSearch');


// Contact Page

Route::get('contact/user/','ContactController@index')->name('contact');
Route::post('contact/user/store/','ContactController@StoreContact')->name('contact.store');
Route::get('user/faq','ContactController@faq')->name('user.faq');
Route::get('terms/condition','ContactController@TermsCondition')->name('terms.condition');
Route::get('error/page/404','ContactController@ErrorPage')->name('error.page');


// User Order View

Route::get('/user/order/{id}','PaymentController@orderView');

// Shop Page All Routes

Route::get('shop/page/','ShopController@index')->name('shop.page');