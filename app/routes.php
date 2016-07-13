<?php

/**
 * BBCMS - A PHP CMS for web newspapers
 *
 * @package  BBCMS
 * @version  1.0
 * @author   BinhBEER <binhbeer@taymay.vn>
 * @link     http://cms.binhbeer.com
 */

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Register all the admin routes.
|
*/

Route::group(array('prefix' => 'admin'), function()
{
	Route::get('deletecaches', array('as' => 'deletecaches', 'uses' => 'Controllers\Admin\DashboardController@getDeleteCaches'));

	# News Management
	Route::group(array('prefix' => 'news'), function()
	{
		Route::get('/', array('as' => 'news', 'uses' => 'Controllers\Admin\NewsController@getIndex'));
		Route::get('search', array('as' => 'search/news', 'uses' => 'Controllers\Admin\NewsController@getSearch'));
		Route::get('create', array('as' => 'create/news', 'uses' => 'Controllers\Admin\NewsController@getCreate'));
		Route::get('postlist', array('as' => 'list/news', 'uses' => 'Controllers\Admin\NewsController@getPostList'));	
		Route::post('create', 'Controllers\Admin\NewsController@postCreate');
		Route::post('setcover', 'Controllers\Admin\NewsController@postSetCover');
		Route::post('setcategory', 'Controllers\Admin\NewsController@postSetCategory');
		Route::get('{NewsId}/edit', array('as' => 'update/news', 'uses' => 'Controllers\Admin\NewsController@getEdit'));
		Route::post('{NewsId}/edit', 'Controllers\Admin\NewsController@postEdit');
		Route::get('{NewsId}/delete', array('as' => 'delete/news', 'uses' => 'Controllers\Admin\NewsController@getDelete'));
		Route::get('{NewsId}/restore', array('as' => 'restore/news', 'uses' => 'Controllers\Admin\NewsController@getRestore'));
		// statistics
		Route::get('statistics', array('as' => 'statistics/news', 'uses' => 'Controllers\Admin\NewsController@getStatistics'));
	});

	# Royalties
	Route::group(array('prefix' => 'royalties'), function()
	{
		Route::get('/', array('as' => 'royalties', 'uses' => 'Controllers\Admin\RoyaltiesController@getRoyalties'));
		Route::get('form', array('as' => 'form/royalties', 'uses' => 'Controllers\Admin\RoyaltiesController@getRoyaltyForm'));
		Route::post('form', 'Controllers\Admin\RoyaltiesController@postRoyaltyForm');
		Route::get('delete', array('as' => 'delete/royalties', 'uses' => 'Controllers\Admin\RoyaltiesController@getRoyaltyDelete'));
	});

	# Categories Management
	Route::group(array('prefix' => 'categories'), function()
	{
		Route::get('/', array('as' => 'categories', 'uses' => 'Controllers\Admin\CategoriesController@getIndex'));
		Route::get('create', array('as' => 'create/category', 'uses' => 'Controllers\Admin\CategoriesController@getCreate'));
		Route::post('create', 'Controllers\Admin\CategoriesController@postCreate');
		Route::get('{catId}/edit', array('as' => 'update/category', 'uses' => 'Controllers\Admin\CategoriesController@getEdit'));
		Route::post('{catId}/edit', 'Controllers\Admin\CategoriesController@postEdit');
		Route::get('{catId}/delete', array('as' => 'delete/category', 'uses' => 'Controllers\Admin\CategoriesController@getDelete'));
	});

	# Tags Management
	Route::group(array('prefix' => 'tags'), function()
	{
		Route::get('/', array('as' => 'tags', 'uses' => 'Controllers\Admin\TagsController@getIndex'));
		Route::get('/listpopup', array('as' => 'list/tag', 'uses' => 'Controllers\Admin\TagsController@getIndexPopup'));
		Route::post('addposts', 'Controllers\Admin\TagsController@postAddPost');
		Route::get('create', array('as' => 'create/tag', 'uses' => 'Controllers\Admin\TagsController@getCreate'));
		Route::post('ajaxcreate', 'Controllers\Admin\TagsController@postCreateTag');
		Route::get('ajaxlist', 'Controllers\Admin\TagsController@getAjaxList');
		Route::get('removepost', array('as' => 'removepost/tag', 'uses' => 'Controllers\Admin\TagsController@removePost'));
		Route::post('create', 'Controllers\Admin\TagsController@postCreate');
		Route::get('{tagId}/edit', array('as' => 'update/tag', 'uses' => 'Controllers\Admin\TagsController@getEdit'));
		Route::post('{tagId}/edit', 'Controllers\Admin\TagsController@postEdit');
		Route::get('{tagId}/delete', array('as' => 'delete/tag', 'uses' => 'Controllers\Admin\TagsController@getDelete'));
	});

	# Intro Management
	Route::group(array('prefix' => 'intro'), function()
	{
		Route::get('/', array('as' => 'intro', 'uses' => 'Controllers\Admin\IntroController@getIndex'));
		Route::get('create', array('as' => 'create/intro', 'uses' => 'Controllers\Admin\IntroController@getCreate'));
		Route::post('create', 'Controllers\Admin\IntroController@postCreate');
		Route::get('{introId}/edit', array('as' => 'update/intro', 'uses' => 'Controllers\Admin\IntroController@getEdit'));
		Route::post('{introId}/edit', 'Controllers\Admin\IntroController@postEdit');
		Route::get('{introId}/delete', array('as' => 'delete/intro', 'uses' => 'Controllers\Admin\IntroController@getDelete'));
	});

	# Intro Management
	Route::group(array('prefix' => 'service'), function()
	{
		Route::get('/', array('as' => 'intro', 'uses' => 'Controllers\Admin\ServiceController@getIndex'));
		Route::get('create', array('as' => 'create/service', 'uses' => 'Controllers\Admin\ServiceController@getCreate'));
		Route::post('create', 'Controllers\Admin\ServiceController@postCreate');
		Route::get('{serviceId}/edit', array('as' => 'update/service', 'uses' => 'Controllers\Admin\ServiceController@getEdit'));
		Route::post('{serviceId}/edit', 'Controllers\Admin\ServiceController@postEdit');
		Route::get('{serviceId}/delete', array('as' => 'delete/service', 'uses' => 'Controllers\Admin\ServiceController@getDelete'));
	});

	# Pages Management
	Route::group(array('prefix' => 'pages'), function()
	{
		Route::get('/', array('as' => 'pages', 'uses' => 'Controllers\Admin\PagesController@getIndex'));
		Route::get('create', array('as' => 'create/page', 'uses' => 'Controllers\Admin\PagesController@getCreate'));
		Route::post('create', 'Controllers\Admin\PagesController@postCreate');	
		Route::get('{pageId}/edit', array('as' => 'update/page', 'uses' => 'Controllers\Admin\PagesController@getEdit'));
		Route::post('{pageId}/edit', 'Controllers\Admin\PagesController@postEdit');
		Route::get('{pageId}/delete', array('as' => 'delete/page', 'uses' => 'Controllers\Admin\PagesController@getDelete'));
	});

	# Comments Management
	Route::group(array('prefix' => 'comments'), function()
	{
		Route::get('/', array('as' => 'comments', 'uses' => 'Controllers\Admin\CommentsController@getIndex'));
		Route::get('{cmtId}/edit', array('as' => 'update/comment', 'uses' => 'Controllers\Admin\CommentsController@getEdit'));
		Route::post('{cmtId}/edit', 'Controllers\Admin\CommentsController@postEdit');
		Route::get('{cmtId}/delete', array('as' => 'delete/comment', 'uses' => 'Controllers\Admin\CommentsController@getDelete'));
	});

	# Medias Management
	Route::group(array('prefix' => 'medias'), function()
	{
		Route::get('/', 'Controllers\Admin\MediasController@getIndex');
		Route::get('upload', array('as' => 'upload/media', 'uses' => 'Controllers\Admin\MediasController@getUpload'));
		Route::post('upload', 'Controllers\Admin\MediasController@postUpload');
		Route::get('my', 'Controllers\Admin\MediasController@getMy');
		Route::get('{mediaId}/delete', array('as' => 'delete/media', 'uses' => 'Controllers\Admin\MediasController@getDelete'));
	});

	# User Management
	Route::group(array('prefix' => 'users'), function()
	{
		Route::get('/', array('as' => 'users', 'uses' => 'Controllers\Admin\UsersController@getIndex'));
		Route::get('create', array('as' => 'create/user', 'uses' => 'Controllers\Admin\UsersController@getCreate'));
		Route::post('create', 'Controllers\Admin\UsersController@postCreate');
		Route::get('{userId}/edit', array('as' => 'update/user', 'uses' => 'Controllers\Admin\UsersController@getEdit'));
		Route::post('{userId}/edit', 'Controllers\Admin\UsersController@postEdit');
		Route::get('{userId}/delete', array('as' => 'delete/user', 'uses' => 'Controllers\Admin\UsersController@getDelete'));
		Route::get('{userId}/restore', array('as' => 'restore/user', 'uses' => 'Controllers\Admin\UsersController@getRestore'));
	});

	# Group Management
	Route::group(array('prefix' => 'groups'), function()
	{
		Route::get('/', array('as' => 'groups', 'uses' => 'Controllers\Admin\GroupsController@getIndex'));
		Route::get('create', array('as' => 'create/group', 'uses' => 'Controllers\Admin\GroupsController@getCreate'));
		Route::post('create', 'Controllers\Admin\GroupsController@postCreate');
		Route::get('{groupId}/edit', array('as' => 'update/group', 'uses' => 'Controllers\Admin\GroupsController@getEdit'));
		Route::post('{groupId}/edit', 'Controllers\Admin\GroupsController@postEdit');
		Route::get('{groupId}/delete', array('as' => 'delete/group', 'uses' => 'Controllers\Admin\GroupsController@getDelete'));
		Route::get('{groupId}/restore', array('as' => 'restore/group', 'uses' => 'Controllers\Admin\GroupsController@getRestore'));
	});

	# Settings Management
	Route::group(array('prefix' => 'settings'), function()
	{
		Route::get('/', array('as' => 'settings', 'uses' => 'Controllers\Admin\SettingsController@getIndex'));
		Route::post('/', 'Controllers\Admin\SettingsController@postIndex');

	});

	# Settings Management
	Route::group(array('prefix' => 'menus'), function()
	{
		Route::get('/', array('as' => 'menus', 'uses' => 'Controllers\Admin\MenusController@getIndex'));
		Route::post('/create', array('as' => 'create/menu', 'uses' => 'Controllers\Admin\MenusController@postCreate'));
		Route::get('{mId}/delete', array('as' => 'delete/menu', 'uses' => 'Controllers\Admin\MenusController@getDelete'));
		Route::post('/link/create', array('as' => 'create/link', 'uses' => 'Controllers\Admin\MenusController@postLinkCreate'));
		Route::get('{lId}/link/delete', array('as' => 'delete/link', 'uses' => 'Controllers\Admin\MenusController@getLinkDelete'));
		Route::post('/', 'Controllers\Admin\MenusController@postIndex');
		Route::post('/updateLinksPosition', 'Controllers\Admin\MenusController@updateLinksPosition');
	});
	# Settings Management
	Route::group(array('prefix' => 'widgets'), function()
	{
		Route::get('/', array('as' => 'widgets', 'uses' => 'Controllers\Admin\WidgetsController@getIndex'));
		Route::get('/ajaxlist', array('as' => 'ajax/widgets', 'uses' => 'Controllers\Admin\WidgetsController@getAjaxList'));
		Route::post('/addwidgetref', array('as' => 'addwr/widgets', 'uses' => 'Controllers\Admin\WidgetsController@postAddWidgetRef'));
		Route::get('/updatewidgetref', array('as' => 'getupdatewr/widgets', 'uses' => 'Controllers\Admin\WidgetsController@getUpdateWidgetRef'));
		Route::post('/updatewidgetref', array('as' => 'updatewr/widgets', 'uses' => 'Controllers\Admin\WidgetsController@postUpdateWidgetRef'));
		Route::post('/removewidgetref', array('as' => 'removewr/widgets', 'uses' => 'Controllers\Admin\WidgetsController@postRemoveWidgetRef'));
		Route::post('/updateposition', array('as' => 'position/widgets', 'uses' => 'Controllers\Admin\WidgetsController@postUpdatePosition'));
	});

	# Shopping cart Management
	Route::group(array('prefix' => 'cart'), function()
	{
		Route::get('/', array('as' => 'cart', 'uses' => 'Controllers\Admin\CartController@getProductIndex'));
		Route::get('search', array('as' => 'search/cart', 'uses' => 'Controllers\Admin\CartController@getProductSearch'));
		Route::post('setcategory', 'Controllers\Admin\CartController@postSetCategory');
		Route::post('addimage', 'Controllers\Admin\CartController@postAddImage');
		Route::post('removeimage', 'Controllers\Admin\CartController@postRemoveImage');
		Route::post('updateposition', 'Controllers\Admin\CartController@postCategoryOrder');
		Route::post('updateattrposition', 'Controllers\Admin\CartController@postAttributeOrder');

		Route::get('products/create', array('as' => 'createpost/cart', 'uses' => 'Controllers\Admin\CartController@getProductCreate'));
		Route::post('products/create', 'Controllers\Admin\CartController@postProductCreate');
		Route::get('products/{HbId}/edit', array('as' => 'updatepost/cart', 'uses' => 'Controllers\Admin\CartController@getProductEdit'));
		Route::post('products/{HbId}/edit', 'Controllers\Admin\CartController@postProductEdit');
		Route::get('products/{HbId}/delete', array('as' => 'deleteproduct/cart', 'uses' => 'Controllers\Admin\CartController@getProductDelete'));
		Route::get('products/{HbId}/restore', array('as' => 'restoreproduct/cart', 'uses' => 'Controllers\Admin\CartController@getProductRestore'));
		// categories
		Route::get('categories', array('as' => 'categories/cart', 'uses' => 'Controllers\Admin\CartController@getCategoryIndex'));
		Route::get('categories/create', array('as' => 'createcategory/cart', 'uses' => 'Controllers\Admin\CartController@getCategoryCreate'));
		Route::post('categories/create', 'Controllers\Admin\CartController@postCategoryCreate');
		Route::get('categories/{HbCatId}/edit', array('as' => 'updatecategory/cart', 'uses' => 'Controllers\Admin\CartController@getCategoryEdit'));
		Route::post('categories/{HbCatId}/edit', 'Controllers\Admin\CartController@postCategoryEdit');
		Route::get('categories/{HbCatId}/delete', array('as' => 'deletecategory/cart', 'uses' => 'Controllers\Admin\CartController@getCategoryDelete'));

		// attributes
		Route::get('attributes', array('as' => 'attributes/cart', 'uses' => 'Controllers\Admin\CartController@getAttributeIndex'));
		Route::post('attributes/create', 'Controllers\Admin\CartController@postAttributeCreate');
		Route::get('attributes/{HbCatId}/edit', array('as' => 'updateattribute/cart', 'uses' => 'Controllers\Admin\CartController@getAttributeEdit'));
		Route::post('attributes/{HbCatId}/edit', 'Controllers\Admin\CartController@postAttributeEdit');
		Route::get('attributes/{HbCatId}/delete', array('as' => 'deleteattribute/cart', 'uses' => 'Controllers\Admin\CartController@getAttributeDelete'));

		// orders
		Route::get('orders', array('as' => 'orders/cart', 'uses' => 'Controllers\Admin\CartController@getOrdersIndex'));
		Route::get('orders/{oId}/edit', array('as' => 'ordersedit/cart', 'uses' => 'Controllers\Admin\CartController@getOrdersEdit'));
		Route::post('orders/{oId}/edit', 'Controllers\Admin\CartController@postOrdersEdit');
		// orders
		Route::get('reviews', array('as' => 'reviews/cart', 'uses' => 'Controllers\Admin\CartController@getReviewsIndex'));
		Route::get('reviews/{rId}/delete', 'Controllers\Admin\CartController@getReviewDelete');
		Route::get('reviews/{rId}/approve', 'Controllers\Admin\CartController@getReviewApprove');
		Route::get('reviews/{rId}/spam', 'Controllers\Admin\CartController@getReviewSpam');
	});

	# Dashboard
	Route::get('/', array('as' => 'admin', 'uses' => 'Controllers\Admin\DashboardController@getIndex'));

});

/*
|--------------------------------------------------------------------------
| Authentication and Authorization Routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::group(array('prefix' => 'auth'), function()
{

	# Login
	Route::get('signin', array('as' => 'signin', 'uses' => 'AuthController@getSignin'));
	Route::post('signin', 'AuthController@postSignin');

	# Register
	Route::get('signup', array('as' => 'signup', 'uses' => 'AuthController@getSignup'));
	Route::post('signup', 'AuthController@postSignup');

	# Account Activation
	Route::get('activate/{activationCode}', array('as' => 'activate', 'uses' => 'AuthController@getActivate'));

	# Forgot Password
	Route::get('forgot-password', array('as' => 'forgot-password', 'uses' => 'AuthController@getForgotPassword'));
	Route::post('forgot-password', 'AuthController@postForgotPassword');

	# Forgot Password Confirmation
	Route::get('forgot-password/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
	Route::post('forgot-password/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');

	# Logout
	Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

});

# Login via social
Route::get('oauth/session/facebook', array('as' => 'osignin-facebook', 'uses' => 'OauthController@getLoginWithFacebook'));
/*
|--------------------------------------------------------------------------
| Account Routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::group(array('prefix' => 'account'), function()
{

	# Account Dashboard
	Route::get('/', array('as' => 'account', 'uses' => 'Controllers\Account\DashboardController@getIndex'));

	# Profile
	Route::get('profile', array('as' => 'profile', 'uses' => 'Controllers\Account\ProfileController@getIndex'));
	Route::post('profile', 'Controllers\Account\ProfileController@postIndex');

	# Profile
	Route::get('orders', array('as' => 'orders', 'uses' => 'Controllers\Account\OrderController@getIndex'));

	# Profile avatar
	Route::get('avatar', array('as' => 'avatar', 'uses' => 'Controllers\Account\ProfileController@getAvatar'));
	Route::post('avatar', 'Controllers\Account\ProfileController@postAvatar');

	# Change Password
	Route::get('change-password', array('as' => 'change-password', 'uses' => 'Controllers\Account\ChangePasswordController@getIndex'));
	Route::post('change-password', 'Controllers\Account\ChangePasswordController@postIndex');

	# Change Email
	Route::get('change-email', array('as' => 'change-email', 'uses' => 'Controllers\Account\ChangeEmailController@getIndex'));
	Route::post('change-email', 'Controllers\Account\ChangeEmailController@postIndex');

});


Route::group(array('prefix' => 'u'), function()
{
	Route::get('{username}', array('as' => 'userprofile', 'uses' => 'Controllers\Profile\ProfileController@getIndex'))
	->where(array( 'username' => '[A-Za-z0-9\_.]+'));
});

Route::get('profile/messages', array('as' => 'profile-msg', 'uses' => 'Controllers\Profile\MessagesController@getIndex'));
Route::get('profile/messages/{conId}', array('as' => 'profile-con', 'uses' => 'Controllers\Profile\MessagesController@getMessages'))->where(array( 'conId' => '[0-9]+'));

Route::get('profile/messages/compose/{uId}', array('as' => 'profile-compose', 'uses' => 'Controllers\Profile\MessagesController@getCompose'));
Route::post('profile/messages/compose', 'Controllers\Profile\MessagesController@postCompose');

Route::post('user/follow', array('as' => 'userfollow', 'uses' => 'Controllers\Profile\ProfileController@postFollow'))
->where(array( 'username' => '[0-9\_]+'));
Route::post('user/unfollow', array('as' => 'userunfollow', 'uses' => 'Controllers\Profile\ProfileController@postUnFollow'))
->where(array( 'username' => '[0-9\_]+'));
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Widget Routes
|--------------------------------------------------------------------------
|
*/
Route::post('widget/contact', 'Controllers\Widget\ContactController@postIndex');
/*
|--------------------------------------------------------------------------
| Medias Routes
|--------------------------------------------------------------------------
|
|
|
*/
Route::get('medias/upload', 'MediasController@getUpload');
Route::post('medias/upload', 'MediasController@postUpload');
Route::post('medias/{mediaId}/delete', 'MediasController@postDelete');
Route::get('medias/my', 'MediasController@getMy');
Route::get('medias/index', 'MediasController@getIndex');

Route::get('notfound', 'BaseController@notfound');

Route::get('about-us', function()
{
	//
	return View::make('frontend/about-us');
});

Route::get('lien-he', array('as' => 'lien-he', 'uses' => 'ContactUsController@getIndex'));
Route::post('lien-he', 'ContactUsController@postIndex');

Route::get('newsletters', array('as' => 'newsletters', 'uses' => 'NewslettersController@getNewsletter'));
Route::post('newsletters', 'NewslettersController@postNewsletter');

// place
Route::get('places', 'PlacesController@getIndex');
Route::get('place/{slug}', array('as' => 'view-place', 'uses' => 'PlacesController@getView'))
	->where(array( 'slug' => '[A-Za-z0-9\-]+'));
Route::post('places/create', 'PlacesController@postCreate');
Route::get('places/{pId}/update', 'PlacesController@getUpdate');
Route::post('places/{pId}/update', 'PlacesController@postUpdate');

// shop
Route::get('shop', 'CartController@getIndex');
Route::get('shop/invoice/{iId}', 'CartController@getInvoice');
Route::get('shop/search', 'CartController@getSearch');
Route::post('shop/postreview/{slug}', 'CartController@postReview');
Route::post('shop/addbasket', 'CartController@postAddBasket');
Route::get('shop/cart', 'CartController@getBasket');
Route::post('shop/cart', 'CartController@postBasket');
Route::post('shop/checkout', 'CartController@postCheckout');
Route::get('shop/thankyou', 'CartController@getThankyou');

Route::get('shop/{slug}', array('as' => 'shop-category', 'uses' => 'CartController@getCategory'))
	->where(array( 'slug' => '[A-Za-z0-9\-]+'));
Route::get('shop/p/{slug}', array('as' => 'shop-product', 'uses' => 'CartController@getProduct'))
	->where(array( 'slug' => '[A-Za-z0-9\-]+'));

Route::get('san-pham/{slug}', array('as' => 'shop-category', 'uses' => 'CartController@getCategory'))
	->where(array( 'slug' => '[A-Za-z0-9\-]+'));
Route::get('san-pham/p/{slug}', array('as' => 'shop-product', 'uses' => 'CartController@getProduct'))
	->where(array( 'slug' => '[A-Za-z0-9\-]+'));


Route::get('page/{pageSlug}', array('as' => 'view-page', 'uses' => 'PagesController@getView'))
	->where(array( 'pageSlug' => '[A-Za-z0-9\-]+'));
Route::get('gioi-thieu/{pageSlug}', array('as' => 'view-intro', 'uses' => 'PagesController@getView'))
	->where(array( 'pageSlug' => '[A-Za-z0-9\-]+'));
Route::get('dich-vu/{pageSlug}', array('as' => 'view-service', 'uses' => 'PagesController@getView'))
	->where(array( 'pageSlug' => '[A-Za-z0-9\-]+'));

Route::get('tags/{tagSlug}', array('as' => 'view-tag', 'uses' => 'NewsController@getTag'))
	->where(array( 'tagSlug' => '[A-Za-z0-9\-]+'));

Route::get('news', array('as' => 'view-news', 'uses' => 'NewsController@getIndex'));

Route::get('{catSlug}', array('as' => 'view-category', 'uses' => 'NewsController@getCategory'))
	->where(array( 'catSlug' => '[A-Za-z0-9\-]+'));

Route::get('{catSlug}/{postSlug}', array('as' => 'view-post', 'uses' => 'NewsController@getView'))
	->where(array('catSlug' => '[A-Za-z0-9\-]+', 'postSlug' => '[A-Za-z0-9\-]+'));
Route::post('{catSlug}/{postSlug}', 'NewsController@postView');

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showIndex'));