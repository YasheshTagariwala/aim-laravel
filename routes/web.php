<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great! 
|
*/

// Route::get('/home', function () {
//     return redirect('/');
// });


//LoginController

Route::get('/new','NewController@index');
Route::post('/new/search','NewController@index');
Route::get('/new/create','NewController@create');
Route::get('/new/edit/{id}','NewController@edit');
Route::post('/new/store', 'NewController@store');
Route::post('/new/update', 'NewController@update');
Route::get('/new/delete/{id}','NewController@destroy');

//RegisterController

Route::get('/ent-register','RegisterController@entrepreneur');
Route::get('/org-register','RegisterController@organization');
Route::get('/sup-register','RegisterController@supporter');
Route::get('/inv-register','RegisterController@investor');
Route::post('/register/store','RegisterController@store');
Route::get('/reg-note','RegisterController@reg_note');


Route::get('/test','TestController@index');
Route::post('/test/search','TestController@index');
Route::get('/test/create','TestController@create');
Route::get('/test/edit/{id}','TestController@edit');
Route::post('/test/store', 'TestController@store');
Route::post('/test/update', 'TestController@update');
Route::get('/test/delete/{id}','TestController@destroy');

//Route::get('/login/{provider}', 'LoginController@redirectToProvider');
//Route::get('/login/{provider}/callback', 'LoginController@handleProviderCallback');

Route::get('/register/{provider}', 'RegisterController@redirectToProvider');
Route::get('/register/{provider}/callback', 'RegisterController@handleProviderCallback');

//HomeController
Route::get('/home','HomeController@home');
Route::get('/','HomeController@index');
Route::get('/login','HomeController@login')->name('login');
Route::get('/logout','HomeController@logout');
Route::get('/register','HomeController@register');
Route::post('/subscribe','HomeController@subscribe');
Route::post('/login/store','HomeController@login_check');
Route::get('/contact','HomeController@contact');
Route::get('/start-campaign','HomeController@startcampaign');
Route::get('/pricing-campaign','HomeController@pricingcampaign');
Route::get('/campaign-support','HomeController@campaignsupport');
Route::get('/org-list','HomeController@orglist');
Route::post('/org-list/search','HomeController@orglist');
Route::get('/why-aim','HomeController@whyaim');
Route::get('/what-aim','HomeController@whataim');
Route::get('/press','HomeController@press');
Route::get('/in-stats','HomeController@instats');
Route::get('/blog','HomeController@blog');
Route::get('/faq','HomeController@faq');
Route::get('/support','HomeController@support');
Route::get('/term-use','HomeController@termuse');
Route::get('/privacy-policy','HomeController@privacy');
Route::post('/contact/store','HomeController@save_contact');
Route::post('/add_invite','HomeController@add_invite');
Route::get('/full-calendar','HomeController@calendar');
Route::get('/users-list','HomeController@usersList');


Route::get('/search','HomeController@userSearch');
Route::get('/profile/{type}/{id}','HomeController@userProfile');


//CategoryController
Route::get('/category','CategoryController@index');

//InviteController
Route::post('/invite/send','InviteController@store');

Route::group(['middleware' => ['userAuth']],function() {

    Route::group(['middleware' => ['roleCheckOrg']],function() {
        //OrganizationController
        Route::get('/organization','OrganizationController@index');
        Route::post('/organization/store','OrganizationController@store');
        Route::post('/organization/{id}/update','OrganizationController@update');
        Route::get('/organization/{id}','OrganizationController@show');
    });

    Route::group(['middleware' => ['roleCheckInv']],function() {
        //InvestorController
        Route::get('/investor','InvestorController@index');
        Route::get('/investor/entrepreneur-list','InvestorController@entrepreneurList');
        Route::get('/investor/entrepreneur/{id}','InvestorController@entrepreneurShow');
        Route::get('/investor/entrepreneur/feedback/{id}','InvestorController@feedback');
        Route::get('/investor/availability','InvestorController@availability');
        Route::post('/investor/availability-store','InvestorController@availabilityStore');
        Route::post('/investor/entrepreneur/feedback/add','InvestorController@feedbackAdd');
        Route::post('/investor/entrepreneur/feedback/delete','InvestorController@feedbackDelete');
        Route::post('/investor/store','InvestorController@store');
        Route::post('/investor/{id}/update','InvestorController@update');
        Route::post('/investor/appointment/status','InvestorController@appointmentStatus');
    });

    Route::group(['middleware' => ['roleCheckSup']],function() {
        //SupporterController
        Route::get('/supporter','SupporterController@index');
        Route::get('/supporter/entrepreneur-list','SupporterController@entrepreneurList');
        Route::get('/supporter/entrepreneur/{id}','SupporterController@entrepreneurShow');
        Route::get('/supporter/entrepreneur/feedback/{id}','SupporterController@feedback');
        Route::post('/supporter/entrepreneur/feedback/add','SupporterController@feedbackAdd');
        Route::post('/supporter/entrepreneur/feedback/delete','SupporterController@feedbackDelete');
        Route::post('/supporter/store','SupporterController@store');
        Route::post('/supporter/appoinment','SupporterController@appoinment');
        Route::post('/supporter/availablity','SupporterController@availablity');
        Route::post('/supporter/{id}/update','SupporterController@update');
        Route::post('/supporter/appointment/status','SupporterController@appointmentStatus');
    });

    Route::group(['middleware' => ['roleCheckEnt']],function() {

        //EntrepreneurController
        Route::get('/entrepreneur','EntrepreneurController@index');
        Route::get('/entrepreneur/get-appointment-details','EntrepreneurController@getAppointmentDetails');
        Route::post('/entrepreneur/appoinment','EntrepreneurController@appoinment');
        Route::post('/entrepreneur/store','EntrepreneurController@store');
        Route::post('/entrepreneur/{id}/update','EntrepreneurController@update');
        Route::get('/entrepreneur/search/{id}','EntrepreneurController@search');
        Route::get('/entrepreneur/show/{id}','EntrepreneurController@show');
        Route::get('/entrepreneur/project','ProjectController@index');
        Route::get('/entrepreneur/project/add-status/{id}','ProjectController@addStatus');
        Route::get('/entrepreneur/all-funding','EntrepreneurController@getAllFunding');
        Route::get('/entrepreneur/cash-out','EntrepreneurController@getAllCashout');
        Route::post('/entrepreneur/cash-out','EntrepreneurController@postCashout');
    });

    Route::post('/project/add-status','ProjectController@addStatusStore');
    Route::post('project/store','ProjectController@store');
    Route::post('project/{id}/update','ProjectController@update');

//MarketplaceController
    Route::get('/market-place','MarketplaceController@index');
    Route::post('/market-place/search','MarketplaceController@index');
    Route::get('/market-place/seller/{userid}','MarketplaceController@sellerDetails');
    Route::get('/market-place/exeleadmen','MarketplaceController@exeleadmen');
    Route::get('/market-place/dashboard','MarketplaceController@dashboard');
    Route::get('/market-place/settings','MarketplaceController@settings');
    Route::get('/market-place/account','MarketplaceController@account');
    Route::post('/market-place/account','MarketplaceController@accountUpdate');
    Route::get('/market-place/product','MarketplaceController@product');
    Route::get('/market-place/product-list','MarketplaceController@product_list');
    Route::get('/market-place/orders','MarketplaceController@orders');
    Route::get('/market-place/report','MarketplaceController@report');
    Route::get('/market-place/payment-history','MarketplaceController@payment');
    Route::get('/market-place/add-product-enquiry','MarketplaceController@productEnquiry');
    Route::post('/market-place/add-product-enquiry','MarketplaceController@addProductEnquiry');
    Route::post('/market-place/add-product-enquiry-comment','MarketplaceController@addProductEnquiryComment');
    Route::get('/market-place/product-enquiry','MarketplaceController@requirment');
    Route::get('/market-place/messages','MarketplaceController@messages');
    Route::get('/market-place/enquiry-details/{id}','MarketplaceController@requirment_details');
    Route::post('/marketplace/store','MarketplaceController@store');
    Route::get('/marketplace/media/{id}/delete', 'MarketplaceController@deleteMarketPlaceMedia');
    Route::post('/market-place/custom-enquiry/store', 'MarketplaceController@customEnquiryStore');
    Route::get('/market-place/product-favorite', 'MarketplaceController@productFavorite');
    Route::post('/market-place/seller/ratingstore', 'MarketplaceController@storeSellerRating');


//ProductController
    Route::get('/product/{id}','ProductController@index');
    Route::get('/product/{id}/edit','ProductController@edit');
    Route::post('/product/{id}/update','ProductController@update');
    Route::get('/product-recent','ProductController@recent');
    Route::get('/requirement-list','ProductController@requirement_lists');
    Route::get('/requirement-new','ProductController@requirement_new');
    Route::post('/product/store','ProductController@store');
    Route::post('/product/ratingstore','ProductController@ratingStore');
    Route::post('/product/add-to-favorite','ProductController@addToFavorite');
    Route::post('/product/delete-favorite','ProductController@deleteFavorite');


//BlogController
    Route::get('/blog/add','BlogController@create');
    Route::get('/blog/{id}/edit','BlogController@edit');
    Route::post('/blog/{id}/update','BlogController@update');
    Route::post('/blog/store','BlogController@store');


//MessageController
    Route::get('/messages','MessageController@index');
    Route::post('/messages/store','MessageController@store');
    Route::post('/messages/send-message','MessageController@sendMessage');
    Route::get('/enquiry','MessageController@enquiry');
    Route::get('/notifications','MessageController@notifications');


//AccountController
    Route::get('/account','AccountController@index');
    Route::post('/account/store','AccountController@store');

//OrderController
    Route::get('/order/{id}','OrderController@show');
    Route::get('/addmoney','AddmoneyController@index');
    Route::post('/addmoney','AddmoneyController@store');
    Route::post('/buynow','OrderController@buynow');
    Route::get('/cart','OrderController@cart');
    Route::get('/checkout','OrderController@checkout');
    Route::post('/placeorder','OrderController@store');
    Route::post('/funding','OrderController@funding');
    Route::get('/cart/del/{id}','OrderController@delcart');
    Route::post('/changeqty','OrderController@changeqty');

//CampaignController
    Route::get('/campaign/add','CampaignController@create');
    Route::get('/campaign/{id}/edit','CampaignController@edit');
    Route::post('/campaign/{id}/update','CampaignController@update');
    Route::post('/campaign/store','CampaignController@store');
});

//Admin Panel
//DashboardController
Route::group(['middleware' => ['adminAuth']],function() {
    Route::get('/admin','admin\DashboardController@index');
    Route::get('/admin/login','admin\LoginController@index');
    Route::post('/admin/login/store','admin\LoginController@store');
    Route::get('/admin/logout','admin\LoginController@logout');
    Route::get('/admin/entrepreneur','admin\EntrepreneurController@index');
    Route::get('/admin/supporter','admin\SupporterController@index');
    Route::get('/admin/investor','admin\InvestorController@index');
    Route::get('/admin/organization','admin\OrganizationController@index');

//EntrepreneurController
    Route::get('/admin/entrepreneur','admin\EntrepreneurController@index');
    Route::get('admin/entrepreneur/create','admin\EntrepreneurController@create');
    Route::post('admin/entrepreneur/store','admin\EntrepreneurController@store');
    Route::get('admin/entrepreneur/edit/{id}','admin\EntrepreneurController@edit');
    Route::get('admin/entrepreneur/{id}','admin\EntrepreneurController@show');
    Route::post('admin/entrepreneur/update','admin\EntrepreneurController@update');
    Route::get('admin/entrepreneur/delete/{id}','admin\EntrepreneurController@destroy');
    Route::get('admin/entrepreneur/hide/{id}','admin\EntrepreneurController@hide');
    Route::get('admin/entrepreneur/unhide/{id}','admin\EntrepreneurController@unhide');

//SupporterController
    Route::get('/admin/supporter','admin\SupporterController@index');
    Route::get('admin/supporter/create','admin\SupporterController@create');
    Route::post('admin/supporter/store','admin\SupporterController@store');
    Route::get('admin/supporter/edit/{id}','admin\SupporterController@edit');
    Route::post('admin/supporter/update','admin\SupporterController@update');
    Route::get('admin/supporter/delete/{id}','admin\SupporterController@destroy');
    Route::get('admin/supporter/{id}','admin\SupporterController@show');
    Route::get('admin/supporter/hide/{id}','admin\SupporterController@hide');
    Route::get('admin/supporter/unhide/{id}','admin\SupporterController@unhide');

//InvestorController
    Route::get('/admin/investor','admin\InvestorController@index');
    Route::get('admin/investor/create','admin\InvestorController@create');
    Route::post('admin/investor/store','admin\InvestorController@store');
    Route::get('admin/investor/edit/{id}','admin\InvestorController@edit');
    Route::post('admin/investor/update','admin\InvestorController@update');
    Route::get('admin/investor/delete/{id}','admin\InvestorController@destroy');
    Route::get('admin/investor/{id}','admin\InvestorController@show');
    Route::get('admin/investor/hide/{id}','admin\InvestorController@hide');
    Route::get('admin/investor/unhide/{id}','admin\InvestorController@unhide');

//OrganizationController
    Route::get('/admin/organization','admin\OrganizationController@index');
    Route::get('admin/organization/create','admin\OrganizationController@create');
    Route::post('admin/organization/store','admin\OrganizationController@store');
    Route::get('admin/organization/edit/{id}','admin\OrganizationController@edit');
    Route::post('admin/organization/update','admin\OrganizationController@update');
    Route::get('admin/organization/delete/{id}','admin\OrganizationController@destroy');
    Route::get('admin/organization/{id}','admin\OrganizationController@show');
    Route::get('admin/organization/hide/{id}','admin\OrganizationController@hide');
    Route::get('admin/organization/unhide/{id}','admin\OrganizationController@unhide');

//ContactController
    Route::get('admin/contacts','admin\ContactController@index');
    Route::get('admin/contacts/create','admin\ContactController@create');
    Route::post('admin/contacts/store','admin\ContactController@store');
    Route::get('admin/contacts/edit/{id}','admin\ContactController@edit');
    Route::post('admin/contacts/update','admin\ContactController@update');
    Route::get('admin/contacts/delete/{id}','admin\ContactController@destroy');
    Route::get('admin/contacts/{id}','admin\ContactController@show');

//TempuserController
    Route::get('admin/temp_user','admin\TempuserController@index');
    Route::get('admin/temp_user/create','admin\TempuserController@create');
    Route::post('admin/temp_user/store','admin\TempuserController@store');
    Route::get('admin/temp_user/edit/{id}','admin\TempuserController@edit');
    Route::post('admin/temp_user/update','admin\TempuserController@update');
    Route::get('admin/temp_user/delete/{id}','admin\TempuserController@destroy');
    Route::get('admin/temp_user/{id}','admin\TempuserController@show');
    Route::get('admin/temp_user/approve/{id}','admin\TempuserController@approve');
    Route::get('admin/temp_user/reject/{id}','admin\TempuserController@reject');

//UserinvitesController
    Route::get('admin/user_invites','admin\UserinvitesController@index');
    Route::get('admin/user_invites/create','admin\UserinvitesController@create');
    Route::get('admin/user_invites/edit/{id}','admin\UserinvitesController@edit');
    Route::get('admin/user_invites/delete/{id}','admin\UserinvitesController@destroy');
    Route::get('admin/user_invites/{id}','admin\UserinvitesController@show');
    Route::post('admin/user_invites/store','admin\UserinvitesController@store');
    Route::post('admin/user_invites/update','admin\UserinvitesController@update');

//UselogsController
    Route::get('admin/userlogs','admin\UserlogsController@index');
    Route::get('admin/userlogs/{id}','admin\UserlogsController@show');

////Entrepreneur_details
//EntrepreneurprofileController
    Route::get('/admin/entrepreneur_profile','admin\EntrepreneurprofileController@index');
    Route::get('admin/entrepreneur_profile/create','admin\EntrepreneurprofileController@create');
    Route::post('admin/entrepreneur_profile/store','admin\EntrepreneurprofileController@store');
    Route::get('admin/entrepreneur_profile/edit/{id}','admin\EntrepreneurprofileController@edit');
    Route::get('admin/entrepreneur_profile/{id}','admin\EntrepreneurprofileController@show');
    Route::post('admin/entrepreneur_profile/update','admin\EntrepreneurprofileController@update');
    Route::get('admin/entrepreneur_profile/delete/{id}','admin\EntrepreneurprofileController@destroy');
    Route::get('admin/entrepreneur_profile/maketop/{id}','admin\EntrepreneurprofileController@maketop');
    Route::get('admin/entrepreneur_profile/makefeature/{id}','admin\EntrepreneurprofileController@makefeature');
    Route::get('admin/entrepreneur_profile/make_top/{id}','admin\EntrepreneurprofileController@make_top');
    Route::get('admin/entrepreneur_profile/make_feature/{id}','admin\EntrepreneurprofileController@make_feature');

//EntrepreneurmanagementController
    Route::get('/admin/entrepreneur_management','admin\EntrepreneurmanagementController@index');
    Route::get('admin/entrepreneur_management/create','admin\EntrepreneurmanagementController@create');
    Route::post('admin/entrepreneur_management/store','admin\EntrepreneurmanagementController@store');
    Route::get('admin/entrepreneur_management/edit/{id}','admin\EntrepreneurmanagementController@edit');
    Route::get('admin/entrepreneur_management/{id}','admin\EntrepreneurmanagementController@show');
    Route::post('admin/entrepreneur_management/update','admin\EntrepreneurmanagementController@update');
    Route::get('admin/entrepreneur_management/delete/{id}','admin\EntrepreneurmanagementController@destroy');

//EntrepreneurcompanyController
    Route::get('/admin/entrepreneur_company','admin\EntrepreneurcompanyController@index');
    Route::get('admin/entrepreneur_company/create','admin\EntrepreneurcompanyController@create');
    Route::post('admin/entrepreneur_company/store','admin\EntrepreneurcompanyController@store');
    Route::get('admin/entrepreneur_company/edit/{id}','admin\EntrepreneurcompanyController@edit');
    Route::get('admin/entrepreneur_company/{id}','admin\EntrepreneurcompanyController@show');
    Route::post('admin/entrepreneur_company/update','admin\EntrepreneurcompanyController@update');
    Route::get('admin/entrepreneur_company/delete/{id}','admin\EntrepreneurcompanyController@destroy');

//EntrepreneurfundingController
    Route::get('/admin/entrepreneur_funding','admin\EntrepreneurfundingController@index');
    Route::get('admin/entrepreneur_funding/create','admin\EntrepreneurfundingController@create');
    Route::post('admin/entrepreneur_funding/store','admin\EntrepreneurfundingController@store');
    Route::get('admin/entrepreneur_funding/edit/{id}','admin\EntrepreneurfundingController@edit');
    Route::get('admin/entrepreneur_funding/{id}','admin\EntrepreneurfundingController@show');
    Route::post('admin/entrepreneur_funding/update','admin\EntrepreneurfundingController@update');
    Route::get('admin/entrepreneur_funding/delete/{id}','admin\EntrepreneurfundingController@destroy');

//EntrepreneurmarketController
    Route::get('/admin/entrepreneur_market','admin\EntrepreneurmarketController@index');
    Route::get('admin/entrepreneur_market/create','admin\EntrepreneurmarketController@create');
    Route::post('admin/entrepreneur_market/store','admin\EntrepreneurmarketController@store');
    Route::get('admin/entrepreneur_market/edit/{id}','admin\EntrepreneurmarketController@edit');
    Route::get('admin/entrepreneur_market/{id}','admin\EntrepreneurmarketController@show');
    Route::post('admin/entrepreneur_market/update','admin\EntrepreneurmarketController@update');
    Route::get('admin/entrepreneur_market/delete/{id}','admin\EntrepreneurmarketController@destroy');

//InvestorprofileController
    Route::get('/admin/investor_profile','admin\InvestorprofileController@index');
    Route::get('admin/investor_profile/create','admin\InvestorprofileController@create');
    Route::post('admin/investor_profile/store','admin\InvestorprofileController@store');
    Route::get('admin/investor_profile/edit/{id}','admin\InvestorprofileController@edit');
    Route::get('admin/investor_profile/{id}','admin\InvestorprofileController@show');
    Route::post('admin/investor_profile/update','admin\InvestorprofileController@update');
    Route::get('admin/investor_profile/delete/{id}','admin\InvestorprofileController@destroy');

//EntrepreneurbusinessplanController
    Route::get('/admin/entrepreneur_businessplan','admin\EntrepreneurbusinessplanController@index');
    Route::get('admin/entrepreneur_businessplan/create','admin\EntrepreneurbusinessplanController@create');
    Route::post('admin/entrepreneur_businessplan/store','admin\EntrepreneurbusinessplanController@store');
    Route::get('admin/entrepreneur_businessplan/edit/{id}','admin\EntrepreneurbusinessplanController@edit');
    Route::get('admin/entrepreneur_businessplan/{id}','admin\EntrepreneurbusinessplanController@show');
    Route::post('admin/entrepreneur_businessplan/update','admin\EntrepreneurbusinessplanController@update');
    Route::get('admin/entrepreneur_businessplan/delete/{id}','admin\EntrepreneurbusinessplanController@destroy');

//MarketplaceController
    Route::get('/admin/marketplace_settings','admin\MarketplaceController@index');
    Route::get('admin/marketplace_settings/create','admin\MarketplaceController@create');
    Route::post('admin/marketplace_settings/store','admin\MarketplaceController@store');
    Route::get('admin/marketplace_settings/edit/{id}','admin\MarketplaceController@edit');
    Route::get('admin/marketplace_settings/{id}','admin\MarketplaceController@show');
    Route::post('admin/marketplace_settings/update','admin\MarketplaceController@update');
    Route::get('admin/marketplace_settings/delete/{id}','admin\MarketplaceController@destroy');

//MessagesController
    Route::get('admin/messages','admin\MessageController@index');
    Route::get('admin/messages/create','admin\MessageController@create');
    Route::post('admin/messages/store','admin\MessageController@store');
    Route::get('admin/messages/edit/{id}','admin\MessageController@edit');
    Route::post('admin/messages/update','admin\MessageController@update');
    Route::get('admin/messages/delete/{id}','admin\MessageController@destroy');
    Route::get('admin/messages/{id}','admin\MessageController@show');

//BlogController
    Route::get('admin/blog','admin\BlogController@index');
    Route::get('admin/blog/create','admin\BlogController@create');
    Route::post('admin/blog/store','admin\BlogController@store');
    Route::get('admin/blog/edit/{id}','admin\BlogController@edit');
    Route::post('admin/blog/update','admin\BlogController@update');
    Route::get('admin/blog/delete/{id}','admin\BlogController@destroy');
    Route::get('admin/blog/{id}','admin\BlogController@show');

//OrganizationprofileController
    Route::get('/admin/organization_profile','admin\OrganizationprofileController@index');
    Route::get('admin/organization_profile/create','admin\OrganizationprofileController@create');
    Route::post('admin/organization_profile/store','admin\OrganizationprofileController@store');
    Route::get('admin/organization_profile/edit/{id}','admin\OrganizationprofileController@edit');
    Route::post('admin/organization_profile/update','admin\OrganizationprofileController@update');
    Route::get('admin/organization_profile/delete/{id}','admin\OrganizationprofileController@destroy');
    Route::get('admin/organization_profile/{id}','admin\OrganizationprofileController@show');

//ProductController
    Route::get('/admin/products','admin\ProductController@index');
    Route::get('admin/products/create','admin\ProductController@create');
    Route::post('admin/products/store','admin\ProductController@store');
    Route::get('admin/products/edit/{id}','admin\ProductController@edit');
    Route::post('admin/products/update','admin\ProductController@update');
    Route::get('admin/products/delete/{id}','admin\ProductController@destroy');
    Route::get('admin/products/{id}','admin\ProductController@show');

//OrderController
    Route::get('/admin/orders','admin\OrderController@index');
    Route::get('admin/orders/create','admin\OrderController@create');
    Route::post('admin/orders/store','admin\OrderController@store');
    Route::get('admin/orders/edit/{id}','admin\OrderController@edit');
    Route::post('admin/orders/update','admin\OrderController@update');
    Route::get('admin/orders/delete/{id}','admin\OrderController@destroy');
    Route::get('admin/orders/{id}','admin\OrderController@show');

//FundController
    Route::get('/admin/funds','admin\FundController@index');
    Route::get('/admin/donations','admin\FundController@indexnew');
    Route::get('admin/funds/create','admin\FundController@create');
    Route::post('admin/funds/store','admin\FundController@store');
    Route::get('admin/funds/edit/{id}','admin\FundController@edit');
    Route::post('admin/funds/update','admin\FundController@update');
    Route::get('admin/funds/delete/{id}','admin\FundController@destroy');
    Route::get('admin/funds/{id}','admin\FundController@show');

//SupporterprofileController
    Route::get('/admin/supporter_profile','admin\SupporterprofileController@index');
    Route::get('admin/supporter_profile/create','admin\SupporterprofileController@create');
    Route::post('admin/supporter_profile/store','admin\SupporterprofileController@store');
    Route::get('admin/supporter_profile/edit/{id}','admin\SupporterprofileController@edit');
    Route::post('admin/supporter_profile/update','admin\SupporterprofileController@update');
    Route::get('admin/supporter_profile/delete/{id}','admin\SupporterprofileController@destroy');
    Route::get('admin/supporter_profile/{id}','admin\SupporterprofileController@show');

//SubscriptionsController
    Route::get('admin/subscriptions','admin\SubscriptionsController@index');
    Route::get('admin/subscriptions/create','admin\SubscriptionsController@create');
    Route::post('admin/subscriptions/store','admin\SubscriptionsController@store');
    Route::get('admin/subscriptions/edit/{id}','admin\SubscriptionsController@edit');
    Route::post('admin/subscriptions/update','admin\SubscriptionsController@update');
    Route::get('admin/subscriptions/delete/{id}','admin\SubscriptionsController@destroy');
    Route::get('admin/subscriptions/{id}','admin\SubscriptionsController@show');
});

Route::get('gitupdate/{pass}/xx','GitController@index');
