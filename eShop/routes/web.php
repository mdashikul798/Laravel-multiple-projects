<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'SiteController@index')->name('index');
Route::get('/product', 'ProductController@index')->name('product');

Auth::routes();



Route::middleware(['auth'])->group(function(){
	
	/**
	*Routes of redirection to the dashboard
	*/
	Route::get('/admin', 'HomeController@index')->name('admin');

	/**
	*Routes of Brand
	*/
	Route::prefix('brand')->group(function(){
		Route::get('/add-brand', 'BrandController@addBrand')->name('add-brand');
		Route::post('/save-brand', 'BrandController@saveBrand')->name('save-brand');
		Route::get('/all-brand', 'BrandController@allBrand')->name('all-brand');
		Route::get('/delete/{id}', 'BrandController@deleteBrand')->name('delete-brand');
		Route::get('/edit/{id}', 'BrandController@editBrand')->name('edit-brand');
		Route::post('/update-brand', 'BrandController@updateBrand')->name('update-brand');
		/**
		*Updating status using ajax
		*/
		Route::get('/brandStatus/{id}/{s}', 'BrandController@brandStatus')->name('brandStatus');
	});

	/**
	*Route for Category
	*/
	Route::prefix('category')->group(function(){
		Route::get('/all-category', 'CategoryController@manageCategory')->name('manage-category');
		Route::get('/add-category', 'CategoryController@addCategory')->name('add-category');
		Route::post('/save-category', 'CategoryController@saveCategory')->name('save-category');
		Route::get('/edit-category/{id}', 'CategoryController@editCategory')->name('edit-category');
		Route::get('/categoryStatus/{id}/{status}', 'CategoryController@categoryStatus')->name('categoryStatus');
		Route::get('/delete-category/{id}', 'CategoryController@deleteCategory')->name('delete-category');
		Route::post('/update-category', 'CategoryController@updateCategory')->name('update-category');
	});

	/**
	*Route for sub-category
	*/
	Route::prefix('category')->group(function(){
		Route::get('/sub-category', 'SubCategoryController@manageSubCategory')->name('sub-category');
		Route::get('/add-subcategory', 'SubCategoryController@addSubCategory')->name('add-subcategory');
		Route::post('/save-subcategory', 'SubCategoryController@saveSubCategory')->name('save-subcategory');
		Route::get('/subCategoryStatus/{id}/{status}', 'SubCategoryController@subCategoryStatus')->name('subCategoryStatus');
		Route::get('/edit-sub-category/{id}', 'SubCategoryController@editSubCategory')->name('edit-sub-category');
		Route::post('/update-subcategory', 'SubCategoryController@updateSubCategory')->name('update-subcategory');
		Route::get('/delete-subCategory/{id}', 'SubCategoryController@deleteSubCategory')->name('delete-subCategory');
	});

	Route::get('/category/sub-subcategory', 'SubSubCategoryController@manageSubSubCategory')->name('sub-subcategory');

	Route::prefix('slider')->group(function(){
		Route::get('/manage-slide', 'SliderController@manageSlide')->name('manage-slide');
		Route::get('/add-slider', 'SliderController@addSlider')->name('add-slider');
		Route::post('/save-slider', 'SliderController@saveSlider')->name('save-slider');
		Route::get('/edit-slider', 'SliderController@editSlide')->name('edit-slider');
		Route::get('/delete-slider/{id}', 'SliderController@deleteSlide')->name('delete-slider');
		Route::get('/sliderStatus/{id}/{status}', 'SliderController@sliderStatus')->name('sliderStatus');

	});
});