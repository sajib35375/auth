<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


Route::get('/auth/redirect', function () {

    return Socialite::driver('facebook')->redirect();
});

Route::get('/auth/callback', function () {
    return Socialite::driver('facebook')
        ->scopes(['read:user', 'public_repo'])
        ->redirect();
    $user = Socialite::driver('facebook')->user();

    $token = $user->token;
    $refreshToken = $user->refreshToken;
    $expiresIn = $user->expiresIn;

    // OAuth 1.0 providers...
    $token = $user->token;
    $tokenSecret = $user->tokenSecret;

    // All providers...
    $user->getId();
    $user->getNickname();
    $user->getName();
    $user->getEmail();
    $user->getAvatar();

    $user = Socialite::driver('facebook')->userFromTokenAndSecret('575325453796151', '3e2b1802efe4a4d111b508cf544ee1f0');
});





Route::get('/', function () {
    return view('welcome');
    });
Route::get('admin/login',[App\Http\Controllers\AdminController::class,'loginForm'])->name('admin.login');
Route::post('admin/login',[App\Http\Controllers\AdminController::class,'store'])->name('admin.store');

Route::group(['middleware'=>['auth:admin']],function(){

//Admin Route
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
return view('admin.index');
    })->name('admin.dashboard');
Route::get('admin/logout',[App\Http\Controllers\AdminController::class,'destroy'])->name('admin.logout');
Route::get('admin/profile',[App\Http\Controllers\AdminProfileController::class,'AdminProfile'])->name('admin.profile');
Route::get('admin/profile/edit',[App\Http\Controllers\AdminProfileController::class,'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('admin/profile/update/{id}',[App\Http\Controllers\AdminProfileController::class,'AdminProfileUpdate'])->name('admin.profile.update');
Route::get('admin/password/change',[App\Http\Controllers\AdminProfileController::class,'AdminPasswordChange'])->name('admin.password.change');
Route::post('admin/password/update',[App\Http\Controllers\AdminProfileController::class,'AdminPasswordUpdate'])->name('admin.password.update');
});

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $user_profile = User::find(Auth::user()->id);
    return view('dashboard',compact('user_profile'));
})->name('dashboard');

//frontend route
Route::get('/',[App\Http\Controllers\HomeController::class,'index'])->name('home.index');
Route::get('/logout',[App\Http\Controllers\HomeController::class,'logout'])->name('home.logout');
Route::get('/profile',[App\Http\Controllers\HomeController::class,'profile'])->name('user.profile');
Route::post('/profile/update',[App\Http\Controllers\HomeController::class,'profileUpdate'])->name('user.profile.update');
Route::get('/change/password',[App\Http\Controllers\HomeController::class,'ChangePassword'])->name('user.change.password');
Route::post('/change/password/update',[App\Http\Controllers\HomeController::class,'ChangePasswordUpdate'])->name('change.password.update');

//brand route
Route::get('brand',[App\Http\Controllers\BrandController::class,'index'])->name('brand.index');
Route::post('brand/store',[App\Http\Controllers\BrandController::class,'brandStore'])->name('brand.store');
Route::get('brand/edit/{id}',[App\Http\Controllers\BrandController::class,'brandEdit'])->name('brand.edit');
Route::post('brand/update/{id}',[App\Http\Controllers\BrandController::class,'brandUpdate'])->name('brand.update');
Route::get('brand/delete/{id}',[App\Http\Controllers\BrandController::class,'brandDelete'])->name('brand.delete');
//category route
Route::get('category',[App\Http\Controllers\CategoryController::class,'AllCategory'])->name('all.category');
Route::post('category/store',[App\Http\Controllers\CategoryController::class,'CategoryStore'])->name('category.store');
Route::get('category/edit/{id}',[App\Http\Controllers\CategoryController::class,'CategoryEdit'])->name('category.edit');
Route::post('category/update/{id}',[App\Http\Controllers\CategoryController::class,'CategoryUpdate'])->name('category.update');
Route::get('category/delete/{id}',[App\Http\Controllers\CategoryController::class,'CategoryDelete'])->name('category.delete');
//sub category route
Route::get('subcategory',[App\Http\Controllers\SubCategoryController::class,'AllSubCategory'])->name('all.subcategory');
Route::post('subcategory/store',[App\Http\Controllers\SubCategoryController::class,'StoreSubCategory'])->name('store.subcategory');
Route::get('sub-category/edit/{id}',[App\Http\Controllers\SubCategoryController::class,'EditSub'])->name('edit.sub');
//Route::get('sub-category/edit/show/{id}',[App\Http\Controllers\SubCategoryController::class,'EditSubShow'])->name('edit.sub.show');
Route::post('sub-category/update/{id}',[App\Http\Controllers\SubCategoryController::class,'UpdateSub'])->name('update.sub');
Route::get('sub-category/delete/{id}',[App\Http\Controllers\SubCategoryController::class,'DeleteSub'])->name('delete.sub');
//sub-subcategory
Route::get('sub-subcategory',[App\Http\Controllers\SubSubCategoryController::class,'AllSubSubCategory'])->name('sub.subcategory');
Route::get('show-subcategory/{id}',[App\Http\Controllers\SubSubCategoryController::class,'ShowSubCategory'])->name('show.subcategory');
Route::post('sub-subcategory/store',[App\Http\Controllers\SubSubCategoryController::class,'SubSubCategory_store'])->name('sub.subcategory.store');
Route::get('sub-subcategory/edit/{id}',[App\Http\Controllers\SubSubCategoryController::class,'SubSubCategory_edit'])->name('sub.subcategory.edit');
Route::get('select-subcategory/{id}',[App\Http\Controllers\SubSubCategoryController::class,'SelectSubCategory_edit'])->name('select.subcategory.edit');
Route::post('sub-subcategory/update/{id}',[App\Http\Controllers\SubSubCategoryController::class,'SubSubCategory_update'])->name('sub.subcategory.update');
Route::get('sub-subcategory/delete/{id}',[App\Http\Controllers\SubSubCategoryController::class,'SubSubCategory_delete'])->name('sub.subcategory.delete');
//products
Route::get('Add-product',[App\Http\Controllers\ProductController::class,'addProduct'])->name('add.product');
Route::get('show-SubSubCategory/{sub_id}',[App\Http\Controllers\SubSubCategoryController::class,'showSubSubCategory'])->name('show.subsubcategory');
Route::post('product/store',[App\Http\Controllers\ProductController::class,'storeProduct'])->name('store.product');
Route::get('manage/product',[App\Http\Controllers\ProductController::class,'manageProduct'])->name('manage.product');
Route::get('edit/product/{id}',[App\Http\Controllers\ProductController::class,'editProduct'])->name('edit.product');
Route::post('update/product/{id}',[App\Http\Controllers\ProductController::class,'updateProduct'])->name('update.product');
Route::post('update/multiImg',[App\Http\Controllers\ProductController::class,'updateMultiImg'])->name('update.multiImg');
Route::get('delete/multiImg/{id}',[App\Http\Controllers\ProductController::class,'deleteMultiImg'])->name('delete.multiImg');
Route::get('delete/product/{id}',[App\Http\Controllers\ProductController::class,'deleteProduct'])->name('delete.product');
Route::get('active/product/{id}',[App\Http\Controllers\ProductController::class,'activeProduct'])->name('active.product');
Route::get('inactive/product/{id}',[App\Http\Controllers\ProductController::class,'inactiveProduct'])->name('inactive.product');

//Sliders
Route::get('slider/show',[App\Http\Controllers\SliderController::class,'SliderShow'])->name('slider.show');
Route::post('slider/store',[App\Http\Controllers\SliderController::class,'SliderStore'])->name('slider.store');
Route::get('slider/edit/{id}',[App\Http\Controllers\SliderController::class,'SliderEdit'])->name('slider.edit');
Route::post('slider/update/{id}',[App\Http\Controllers\SliderController::class,'SliderUpdate'])->name('slider.update');
Route::get('status/active/{id}',[App\Http\Controllers\SliderController::class,'StatusActive'])->name('status.active');
Route::get('status/inactive/{id}',[App\Http\Controllers\SliderController::class,'StatusInactive'])->name('status.inactive');
Route::get('slider/delete/{id}',[App\Http\Controllers\SliderController::class,'SliderDelete'])->name('slider.delete');
//language
Route::get('language/english',[App\Http\Controllers\LanguageController::class,'English'])->name('english.language');
Route::get('language/bangla',[App\Http\Controllers\LanguageController::class,'Bangla'])->name('bangla.language');
//product details
Route::get('product/details/{id}',[App\Http\Controllers\HomeController::class,'ProductDetails'])->name('product.details');
Route::get('tagwise/product/{tag}',[App\Http\Controllers\HomeController::class,'TagwiseProduct'])->name('tagwise.product');
Route::get('catWise/product/{id}',[App\Http\Controllers\HomeController::class,'catWiseProduct'])->name('catWise.product');
Route::get('SubSubCatWise/product/{id}',[App\Http\Controllers\HomeController::class,'SubSubCatWise'])->name('SubSubCatWise.product');

//add to cart
Route::get('show/add_to_cart/{id}',[App\Http\Controllers\HomeController::class,'addToCartShow'])->name('add.to.cart');
Route::post( 'AddToCart-store/{cart_id}',[App\Http\Controllers\CartController::class,'AddToCart'])->name('addTo.cart');
Route::get( 'AddTo/MiniCart/',[App\Http\Controllers\CartController::class,'AddToMiniCart'])->name('addTo.miniCart');
Route::get( 'remove/MiniCart/product/{rowId}',[App\Http\Controllers\CartController::class,'RemoveMiniCart'])->name('remove.miniCart');

Route::post('add/wishlist/{id}',[App\Http\Controllers\WishlistController::class,'AddToWishlist'])->name('addTo.wishlist');

Route::group(['middleware'=>'user'],function(){
//wishlist
Route::get('view/wishlist/',[App\Http\Controllers\WishlistController::class,'ViewWishlist'])->name('view.wishlist');
Route::get('show/wishlist',[App\Http\Controllers\WishlistController::class,'ShowWishlist'])->name('show.wishlist');
Route::get('/remove/wishlist-product/{id}',[App\Http\Controllers\WishlistController::class,'RemoveWishlist'])->name('remove.wishlist');
Route::post('stripe/order',[App\Http\Controllers\StripeController::class,'StripeOrder'])->name('stripe.order');
Route::get('user/order',[App\Http\Controllers\OrderController::class,'UserOrder'])->name('user.order');
Route::get('user/order/details/{id}',[App\Http\Controllers\OrderController::class,'OrderDetail'])->name('order.details');
Route::get('invoice/download/{id}',[App\Http\Controllers\OrderController::class,'InvoiceDownload'])->name('invoice.download');
Route::post('return/order/{id}',[App\Http\Controllers\OrderController::class,'ReturnOrder'])->name('return.order.send');
Route::get('show/return/order',[App\Http\Controllers\OrderController::class,'ShowReturnOrder'])->name('show.return.order');
Route::get('show/cancel/order',[App\Http\Controllers\OrderController::class,'ShowCancelOrder'])->name('show.cancel.order');
Route::post('tracking/order',[App\Http\Controllers\AdminUserController::class,'TrackingOrder'])->name('tracking.order');

});
//CartPage Route
Route::get('view/myCart/',[App\Http\Controllers\CartPageController::class,'ViewMyCert'])->name('my.cart');
Route::get('load/myCart',[App\Http\Controllers\CartPageController::class,'LoadMyCert'])->name('load.my.cart');
Route::get('remove/myCart/{id}',[App\Http\Controllers\CartPageController::class,'RemoveMyCart'])->name('remove.my.cart');
Route::get('/cart/increment/{rowId}',[App\Http\Controllers\CartPageController::class,'cartIncrement'])->name('cart.increment');
Route::get('/cart/decrement/{rowId}',[App\Http\Controllers\CartPageController::class,'cartDecrement'])->name('cart.decrement');
//coupon
Route::get('manage/coupon',[App\Http\Controllers\CouponController::class,'manageCoupon'])->name('manage.coupon');
Route::post('coupon/store',[App\Http\Controllers\CouponController::class,'CouponStore'])->name('coupon.store');
Route::get('coupon/edit/{id}',[App\Http\Controllers\CouponController::class,'CouponEdit'])->name('coupon.edit');
Route::post('coupon/update/{id}',[App\Http\Controllers\CouponController::class,'CouponUpdate'])->name('coupon.update');
Route::get('coupon/delete/{id}',[App\Http\Controllers\CouponController::class,'CouponDelete'])->name('coupon.delete');
//shipping(division)
Route::get('shipping/division',[App\Http\Controllers\ShippingController::class,'allDivision'])->name('all.division');
Route::post('shipping/division/store',[App\Http\Controllers\ShippingController::class,'DivisionStore'])->name('division.store');
Route::get('shipping/division/edit/{id}',[App\Http\Controllers\ShippingController::class,'DivisionEdit'])->name('division.edit');
Route::post('shipping/division/update/{id}',[App\Http\Controllers\ShippingController::class,'DivisionUpdate'])->name('division.update');
Route::get('shipping/division/delete/{id}',[App\Http\Controllers\ShippingController::class,'DivisionDelete'])->name('division.delete');
//shipping(district)
Route::get('shipping/district',[App\Http\Controllers\ShippingController::class,'allDistrict'])->name('all.district');
Route::post('shipping/district/store',[App\Http\Controllers\ShippingController::class,'DistrictStore'])->name('store.district');
Route::get('shipping/district/edit/{id}',[App\Http\Controllers\ShippingController::class,'DistrictEdit'])->name('edit.district');
Route::post('shipping/district/update/{id}',[App\Http\Controllers\ShippingController::class,'DistrictUpdate'])->name('update.district');
Route::get('shipping/district/delete/{id}',[App\Http\Controllers\ShippingController::class,'DistrictDelete'])->name('delete.district');
Route::get('shipping/district/editShow/{id}',[App\Http\Controllers\ShippingController::class,'DistrictEditShow'])->name('district.edit.show');
//shipping(state)
Route::get('shipping/state',[App\Http\Controllers\ShippingController::class,'allState'])->name('all.state');
Route::post('shipping/state/store',[App\Http\Controllers\ShippingController::class,'StateStore'])->name('store.state');
Route::get('district/show/{id}',[App\Http\Controllers\ShippingController::class,'districtShow'])->name('district.show');
Route::get('state/edit/{id}',[App\Http\Controllers\ShippingController::class,'stateEdit'])->name('state.edit');
Route::post('state/update/{id}',[App\Http\Controllers\ShippingController::class,'stateUpdate'])->name('state.update');
Route::get('state/delete/{id}',[App\Http\Controllers\ShippingController::class,'stateDelete'])->name('state.delete');
Route::get('state/editShow/{id}',[App\Http\Controllers\ShippingController::class,'StateEditShow'])->name('state.edit.show');
//couponApply
Route::post('couponApply',[App\Http\Controllers\CartController::class,'couponApply'])->name('apply.coupon');
Route::get('coupon/calculation',[App\Http\Controllers\CartController::class,'couponCalculation'])->name('calculation.coupon');
Route::get('/coupon/remove',[App\Http\Controllers\CartController::class,'removeCoupon'])->name('remove.coupon');
//checkout page
Route::get('/checkout',[App\Http\Controllers\CartController::class,'checkout'])->name('checkout');
Route::get('show-district/{id}',[App\Http\Controllers\CheckoutController::class,'showDistrict'])->name('show.district');
Route::get('show-states/{id}',[App\Http\Controllers\CheckoutController::class,'showState'])->name('show.state');
Route::post('/checkout/store',[App\Http\Controllers\CheckoutController::class,'checkOutStore'])->name('checkout.store');
Route::post('/cash-on-delivery/store',[App\Http\Controllers\CashController::class,'CashOutStore'])->name('cashOut.store');

//orders
Route::get('pending/orders',[App\Http\Controllers\AdminOrdersController::class,'PendingOrders'])->name('pending.orders');
Route::get('user/orders/{id}',[App\Http\Controllers\AdminOrdersController::class,'UserOrders'])->name('user.orders');
Route::get('confirm/orders',[App\Http\Controllers\AdminOrdersController::class,'ConfirmedOrder'])->name('confirm.order');
Route::get('processing/orders',[App\Http\Controllers\AdminOrdersController::class,'ProcessingOrder'])->name('processing.order');
Route::get('picked/orders',[App\Http\Controllers\AdminOrdersController::class,'PickedOrder'])->name('picked.order');
Route::get('shipped/orders',[App\Http\Controllers\AdminOrdersController::class,'ShippedOrder'])->name('shipped.order');
Route::get('delivered/orders',[App\Http\Controllers\AdminOrdersController::class,'DeliveredOrder'])->name('delivered.order');
Route::get('cancel/orders',[App\Http\Controllers\AdminOrdersController::class,'CancelOrder'])->name('cancel.order');
//status
Route::get('confirm/order/status/{id}',[App\Http\Controllers\AdminOrdersController::class,'ConfirmOrder'])->name('confirmed.order');
Route::get('process/order/status/{id}',[App\Http\Controllers\AdminOrdersController::class,'ProcessOrder'])->name('process.order');
Route::get('pick/order/status/{id}',[App\Http\Controllers\AdminOrdersController::class,'PickOrder'])->name('pick.order');
Route::get('ship/order/status/{id}',[App\Http\Controllers\AdminOrdersController::class,'ShipOrder'])->name('ship.order');
Route::get('delivery/order/status/{id}',[App\Http\Controllers\AdminOrdersController::class,'DeliveryOrder'])->name('delivery.order');
Route::get('cancel/order/status/{id}',[App\Http\Controllers\AdminOrdersController::class,'CanOrder'])->name('canceled.order');
//invoice download
Route::get('invoice/down/{id}',[App\Http\Controllers\AdminOrdersController::class,'invoiceDown'])->name('invoice.down');
//all reports
Route::get('all/reports',[App\Http\Controllers\ReportController::class,'allReports'])->name('all.report');
Route::post('search/reports/by/date',[App\Http\Controllers\ReportController::class,'searchReportsByDate'])->name('search.report.date');
Route::post('search/reports/by/month',[App\Http\Controllers\ReportController::class,'searchReportsByMonth'])->name('search.report.month');
Route::post('search/reports/by/year',[App\Http\Controllers\ReportController::class,'searchReportsByYear'])->name('search.report.year');
//user show
Route::get('all/users',[App\Http\Controllers\AdminProfileController::class,'allUser'])->name('all.user');
//blog
Route::get('blog/category',[App\Http\Controllers\BlogPostController::class,'blogCategory'])->name('blag.category');
Route::post('blog/category/store',[App\Http\Controllers\BlogPostController::class,'blogCategoryStore'])->name('blag.category.store');
Route::get('add/new/post',[App\Http\Controllers\BlogPostController::class,'AddNewPost'])->name('add.new.post');
Route::post('add/new/post/store',[App\Http\Controllers\BlogPostController::class,'AddNewPostStore'])->name('add.new.post.store');
Route::get('view/new/post/',[App\Http\Controllers\BlogPostController::class,'ViewNewPost'])->name('view.new.post');
//frontend blog
Route::get('blog/index',[App\Http\Controllers\BlogPageController::class,'index'])->name('blog.index');
Route::get('post/details/{id}',[App\Http\Controllers\BlogPageController::class,'PostDetails'])->name('post.details');
Route::get('category/post/{id}',[App\Http\Controllers\BlogPageController::class,'CategoryPost'])->name('category.post');
//site setting
Route::get('site/setting',[App\Http\Controllers\SiteSettingController::class,'SiteSetting'])->name('site.setting');
Route::post('site/setting/update/{id}',[App\Http\Controllers\SiteSettingController::class,'SiteSettingUpdate'])->name('site.setting.update');
//seo setting
Route::get('seo/setting',[App\Http\Controllers\SiteSettingController::class,'SeoPage'])->name('seo.page');
Route::post('seo/setting/update{id}',[App\Http\Controllers\SiteSettingController::class,'SeoPageUpdate'])->name('seo.page.update');
//return order
Route::get('return/order',[App\Http\Controllers\ReturnOrderController::class,'ReturnOrder'])->name('return.order');
Route::get('return/order/approve/{id}',[App\Http\Controllers\ReturnOrderController::class,'ReturnOrderApprove'])->name('return.order.approve');
Route::get('all/return/order/approve',[App\Http\Controllers\ReturnOrderController::class,'AllReturnOrderApprove'])->name('all.return.order.approve');
//review product
Route::post('review/store/{id}',[App\Http\Controllers\ReviewController::class,'ReviewProduct'])->name('review.store');
Route::get('admin/pending/review',[App\Http\Controllers\ReviewController::class,'PendingReview'])->name('pending.review');
Route::get('admin/approve/review/{id}',[App\Http\Controllers\ReviewController::class,'ApproveReview'])->name('approve.review');
Route::get('admin/review/show',[App\Http\Controllers\ReviewController::class,'ApproveReviewShow'])->name('approve.review.show');
Route::get('admin/review/delete/{id}',[App\Http\Controllers\ReviewController::class,'DeleteReview'])->name('delete.review');
//product stock
Route::get('product/stock',[App\Http\Controllers\ProductController::class,'ProductStock'])->name('product.stock');
//admin role
Route::get('admin/user',[App\Http\Controllers\AdminUserController::class,'AdminUser'])->name('admin.user');
Route::get('add/admin/user',[App\Http\Controllers\AdminUserController::class,'AddAdminUser'])->name('add.admin.user');
Route::post('add/admin-user/store',[App\Http\Controllers\AdminUserController::class,'AddAdminUserStore'])->name('add.admin.user.store');
Route::get('admin-user/edit/{id}',[App\Http\Controllers\AdminUserController::class,'AdminUserEdit'])->name('admin.user.edit');
Route::post('admin-user/update/{id}',[App\Http\Controllers\AdminUserController::class,'AdminUserUpdate'])->name('admin.user.update');
Route::get('admin-user/delete/{id}',[App\Http\Controllers\AdminUserController::class,'AdminUserDelete'])->name('admin.user.delete');
//search
Route::post('search',[App\Http\Controllers\HomeController::class,'SearchProduct'])->name('search.product');
Route::post('advance/search',[App\Http\Controllers\HomeController::class,'AdvanceSearch'])->name('advance.search');
//user edit delete
Route::get('user/edit/{id}',[App\Http\Controllers\AdminProfileController::class,'UserEdit'])->name('user.edit');
Route::post('user/update/{id}',[App\Http\Controllers\AdminProfileController::class,'UserUpdate'])->name('user.update');
//shipping charge
Route::get('show-district-name/{id}',[App\Http\Controllers\CartPageController::class,'ShowDistrict'])->name('show.district');
// state name
Route::get('show-state-name/{id}',[App\Http\Controllers\CartPageController::class,'showState'])->name('show.state');
Route::get('show-shipping-charge/{id}',[App\Http\Controllers\CartPageController::class,'showShippingCharge'])->name('show.shipping.charge');
Route::post('add-shipping-charge',[App\Http\Controllers\CartPageController::class,'addShipping'])->name('add.ship');
Route::post('shipping/address',[App\Http\Controllers\CartPageController::class,'shippingAddress'])->name('shipping.address');
//blog comment
Route::post('store/comment',[App\Http\Controllers\CommentController::class,'commentStore'])->name('comment.store');
Route::post('store/reply',[App\Http\Controllers\CommentController::class,'replyStore'])->name('reply.store');
