<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

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

Route::group(['middleware' =>'check.login.admin'],function(){
    Route::match(['get','post'],'/admin','Admin_Controller\Base_Controller@login')->name('admin.login');
});

Route::group(['prefix'=>'/admin','middleware' =>'auth.admin'],function(){
        //Dash board
        Route::get('dashboard','Admin_Controller\Dashboard_Controller@index')->name('admin.dashboard');
        // Banner
        Route::get('banner','Admin_Controller\Banner_Controller@index')->name('admin.banner');
        Route::post('banner-display','Admin_Controller\Banner_Controller@display')->name('admin.banner.display');
        Route::match(['get','post'],'banner-add','Admin_Controller\Banner_Controller@add')->name('admin.banner.add');
        Route::match(['get','post'],'banner-edit/{id}','Admin_Controller\Banner_Controller@edit')->name('admin.banner.edit');
        Route::get('banner-delete/{id}','Admin_Controller\Banner_Controller@delete')->name('admin.banner.delete');
        // Slide
        Route::get('slide','Admin_Controller\Slide_Controller@index')->name('admin.slide');
        Route::match(['get','post'],'slide-add','Admin_Controller\Slide_Controller@add')->name('admin.slide.add');
        Route::match(['get','post'],'slide-edit/{id}','Admin_Controller\Slide_Controller@edit')->name('admin.slide.edit');
        Route::get('slide-delete/{id}','Admin_Controller\Slide_Controller@delete')->name('admin.slide.delete');
        //conffig
        Route::match(['get','post'],'config','Admin_Controller\Config_Controller@index')->name('admin.config');
        //Video
        Route::get('video','Admin_Controller\Video_Controller@index')->name('admin.video');
        Route::post('video-display','Admin_Controller\Video_Controller@display')->name('admin.video.display');
        Route::match(['get','post'],'video-add','Admin_Controller\Video_Controller@add')->name('admin.video.add');
        Route::match(['get','post'],'video-edit/{id}','Admin_Controller\Video_Controller@edit')->name('admin.video.edit');
        Route::get('video-delete/{id}','Admin_Controller\Video_Controller@delete')->name('admin.video.delete');
        //Simple Page
        Route::get('simple-page','Admin_Controller\SimplePage_Controller@index')->name('admin.simplepage');
        Route::get('simple-page-detail/{id}','Admin_Controller\SimplePage_Controller@detail')->name('admin.simplepage.detail');
        Route::match(['get','post'],'simple-page-add','Admin_Controller\SimplePage_Controller@add')->name('admin.simplepage.add');
        Route::match(['get','post'],'simple-page-edit/{id}','Admin_Controller\SimplePage_Controller@edit')->name('admin.simplepage.edit');
        Route::get('simple-page-delete/{id}','Admin_Controller\SimplePage_Controller@delete')->name('admin.simplepage.delete');
        // KPI
        Route::get('kpi','Admin_Controller\Kpi_Controller@index')->name('admin.kpi');
        Route::match(['get','post'],'kpi-add','Admin_Controller\Kpi_Controller@add')->name('admin.kpi.add');
        Route::match(['get','post'],'kpi-edit/{id}','Admin_Controller\Kpi_Controller@edit')->name('admin.kpi.edit');
        Route::get('kpi-delete/{id}','Admin_Controller\Kpi_Controller@delete')->name('admin.kpi.delete');
        //Customer
        Route::get('customer/{key?}/{type?}','Admin_Controller\Customer_Controller@index')->name('admin.customer');
        Route::get('customer-search/{key}/{type}','Admin_Controller\Customer_Controller@search')->name('admin.customer.search');
        Route::get('customer-form','Admin_Controller\Customer_Controller@form')->name('admin.customer.form');
        Route::post('customer-add-ajax','Admin_Controller\Customer_Controller@add_ajax')->name('admin.customer.add.ajax');
        Route::match(['get','post'],'customer-add','Admin_Controller\Customer_Controller@add')->name('admin.customer.add');
        Route::match(['get','post'],'customer-edit/{id}','Admin_Controller\Customer_Controller@edit')->name('admin.customer.edit');
        Route::get('customer-delete/{id}','Admin_Controller\Customer_Controller@delete')->name('admin.customer.delete');
        //Member
        Route::get('member','Admin_Controller\Member_Controller@index')->name('admin.member');
        Route::get('member-detail/{id}','Admin_Controller\Member_Controller@detail')->name('admin.member.detail');
        Route::post('member-status','Admin_Controller\Member_Controller@status')->name('admin.member.status');
        Route::match(['get','post'],'member-edit/{id}','Admin_Controller\Member_Controller@edit')->name('admin.member.edit');

        //Admin
        Route::get('admin','Admin_Controller\Admin_Controller@index')->name('admin.admin');
        Route::post('admin-status','Admin_Controller\Admin_Controller@status')->name('admin.admin.status');
        Route::match(['get','post'],'admin-add','Admin_Controller\Admin_Controller@add')->name('admin.admin.add');
        Route::match(['get','post'],'admin-edit/{id}','Admin_Controller\Admin_Controller@edit')->name('admin.admin.edit');

        //Bill
        Route::get('bill/{where?}','Admin_Controller\Bill_Controller@index')->name('admin.bill');
        Route::get('bill-search/{key}','Admin_Controller\Bill_Controller@search')->name('admin.bill.search');
        Route::get('bill-choose-product/{id?}','Admin_Controller\Bill_Controller@choose_product')->name('admin.bill.choose');
        Route::get('bill-detail/{id}','Admin_Controller\Bill_Controller@detail')->name('admin.bill.detail');
        Route::post('bill-select-status','Admin_Controller\Bill_Controller@select_status')->name('admin.bill.select.status');
        Route::match(['get','post'],'bill-add','Admin_Controller\Bill_Controller@add')->name('admin.bill.add');
        Route::get('bill-gate-edit/{id}','Admin_Controller\Bill_Controller@gate_edit')->name('admin.bill.gate.edit');
        Route::match(['get','post'],'bill-edit/{id}','Admin_Controller\Bill_Controller@edit')->name('admin.bill.edit');
    
        //Category new
        Route::get('category-new','Admin_Controller\CategoryNew_Controller@index')->name('admin.category.new');
        Route::post('category-new-add','Admin_Controller\CategoryNew_Controller@add')->name('admin.category.new.add');
        Route::match(['get','post'],'category-new-edit/{id}','Admin_Controller\CategoryNew_Controller@edit')->name('admin.category.new.edit');
        Route::get('category-new-delete/{id}/{parent_id}','Admin_Controller\CategoryNew_Controller@delete')->name('admin.category.new.delete');

        //new
        Route::get('new/{key?}','Admin_Controller\New_Controller@index')->name('admin.new');
        Route::get('new-detail/{id}','Admin_Controller\New_Controller@detail')->name('admin.new.detail');
        Route::match(['get','post'],'new-add','Admin_Controller\New_Controller@add')->name('admin.new.add');
        Route::match(['get','post'],'new-edit/{id}','Admin_Controller\New_Controller@edit')->name('admin.new.edit');
        Route::get('new-delete/{id}','Admin_Controller\New_Controller@delete')->name('admin.new.delete');
        //Category product
        Route::get('category-product','Admin_Controller\CategoryProduct_Controller@index')->name('admin.category.product');
        Route::post('category-product-add','Admin_Controller\CategoryProduct_Controller@add')->name('admin.category.product.add');
        Route::match(['get','post'],'category-product-edit/{id}','Admin_Controller\CategoryProduct_Controller@edit')->name('admin.category.product.edit');
        Route::get('category-product-delete/{id}/{parent_id}','Admin_Controller\CategoryProduct_Controller@delete')->name('admin.category.product.delete');
        //Menu    
        Route::get('menu','Admin_Controller\Menu_Controller@index')->name('admin.menu');
        Route::post('menu-add','Admin_Controller\Menu_Controller@add')->name('admin.menu.add');
        Route::match(['get','post'],'menu-edit/{id}','Admin_Controller\Menu_Controller@edit')->name('admin.menu.edit');
        Route::get('menu-delete/{id}/{parent_id}','Admin_Controller\Menu_Controller@delete')->name('admin.menu.delete');
        //Product
        Route::get('product/{key?}/{type?}','Admin_Controller\Product_Controller@index')->name('admin.product');
        Route::get('product-choose-product/{id?}','Admin_Controller\Product_Controller@choose_product')->name('admin.product.choose');
        Route::get('product-detail/{id}','Admin_Controller\Product_Controller@detail')->name('admin.product.detail');
        Route::match(['get','post'],'product-add','Admin_Controller\Product_Controller@add')->name('admin.product.add');
        Route::match(['get','post'],'product-edit/{id}','Admin_Controller\Product_Controller@edit')->name('admin.product.edit');
        Route::get('product-delete/{id}','Admin_Controller\Product_Controller@delete')->name('admin.product.delete');
        //Analyst 
        Route::get('hot','Admin_Controller\Hot_Controller@index')->name('admin.hot');
        Route::get('vip-customer','Admin_Controller\VipCustomer_Controller@index')->name('admin.vip.customer');
        Route::get('revenue','Admin_Controller\Revenue_Controller@index')->name('admin.revenue');
        Route::get('test','Admin_Controller\Bill_Controller@test')->name('admin.logout');
        //agency
        Route::get('agency/{key?}/{type?}','Admin_Controller\Agency_Controller@index')->name('admin.agency');
        Route::match(['get','post'],'agency-add','Admin_Controller\Agency_Controller@add')->name('admin.agency.add');
        Route::match(['get','post'],'agency-edit/{id}','Admin_Controller\Agency_Controller@edit')->name('admin.agency.edit');
        Route::get('agency-delete/{id}','Admin_Controller\Agency_Controller@delete')->name('admin.agency.delete');

//logout
Route::get('logout','Admin_Controller\Base_Controller@logout')->name('admin.logout');
});


Route::group(['prefix' => 'laravel-filemanager','middleware'=>'auth.admin'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['middleware' =>'check.login.member'],function(){
    Route::post('login','Client_Controller\Base_Controller@login')->name('login');
    Route::get('dang-nhap','Client_Controller\Login_Controller@index')->name('member.login');
    Route::post('dang-ki','Client_Controller\Login_Controller@register')->name('member.register');
    Route::get('auth/redirect/{provider}', 'Client_Controller\Base_Controller@redirect')->name('callback.facebook');
    Route::get('callback/{provider}', 'Client_Controller\Base_Controller@callback');
});


Route::group(['prefix'=>'/member','middleware' =>'auth.member'],function(){
    Route::get('','Member_Controller\Introduction_Controller@index')->name('member.intro');
    Route::get('logout','Client_Controller\Base_Controller@logout')->name('logout');
    Route::post('doi-thong-tin','Member_Controller\Introduction_Controller@edit')->name('member.edit');
    Route::match(['post','get'],'doi-thong-tin-gui-hang/{id}','Member_Controller\Introduction_Controller@edit_customer')->name('member.edit.customer');
    Route::match(['post','get'],'them-thong-tin-gui-hang','Member_Controller\Introduction_Controller@add_customer')->name('member.add.customer');
    Route::get('xoa-thong-tin-gui-hang/{id}','Member_Controller\Introduction_Controller@delete_customer')->name('member.delete.customer');
    Route::get('don-hang/{where?}','Member_Controller\Bill_Controller@index')->name('member.bill');
    Route::get('don-hang-detail/{id}','Member_Controller\Bill_Controller@detail')->name('member.bill.detail');
});

Route::group(['prefix'=>'/'],function(){
        Route::get('','Client_Controller\Home_Controller@index')->name('home');
        
        Route::get('danh-sach-san-pham/{slug?}','Client_Controller\CategoryProduct_Controller@index')->name('category.product');
        Route::get('san-pham/{slug}','Client_Controller\Product_Controller@index')->name('product');
        Route::get('product_list/{land?}/{slug?}/{sort?}','Client_Controller\CategoryProduct_Controller@product_list')->name('product.list');
        
        
        Route::get('danh-sach-bai-viet/{slug?}','Client_Controller\CategoryNew_Controller@index')->name('category.new');
        Route::get('bai-viet/{slug}','Client_Controller\New_Controller@index')->name('blog');
        
        Route::get('gio-hang','Client_Controller\Cart_Controller@index')->name('cart');
        Route::get('thanh-toan/{id?}','Client_Controller\Pay_Controller@index')->name('pay');
        Route::get('thanh-toan-thanh-cong/{code}','Client_Controller\Pay_Controller@success')->name('pay.success');
        Route::post('add-thanh-toan','Client_Controller\Pay_Controller@add')->name('pay.add');
        Route::get('ward/{id}','Client_Controller\Pay_Controller@ward')->name('tawd');
        Route::get('district','Client_Controller\Pay_Controller@district')->name('district');
        Route::get('phan-phoi','Client_Controller\Agency_Controller@index')->name('agency');
        Route::get('404','Client_Controller\Error_Controller@index')->name('404');
        Route::get('{slug}','Client_Controller\SimpleSite_Controller@index')->name('simple.site');
});