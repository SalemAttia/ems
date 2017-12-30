<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| 
|
*/

/*notification*/
Route::post('/sendNotification/{id}','feedback\NotificationController@makenotification');
Route::get('/feedback','feedback\NotificationController@unread');
Route::get('/markAsRead/{id}','feedback\NotificationController@markAsRead');
Route::get('profile/markAsRead/{id}','feedback\NotificationController@markAsRead');

//Delete notification 
Route::get('/ndelete/{id}',function($id){
  
  $not = \Illuminate\Notifications\DatabaseNotification::find($id);
  $not->delete();
  return redirect('/allnot');
});



// end notification


Route::get('/users/all','HomeController@custusers');
Route::get('/sms/{code}','HomeController@sms');
Route::get('/sms','HomeController@newsms');
Route::get('/home','HomeController@index');
Route::get('/confirm','HomeController@confirm');
Route::post('/confirm','HomeController@confirmPost');
Route::get('/newCode','HomeController@newsms');
Route::resource('profile','CreateUserEmployee');
Route::get('/accountedit','CreateUserEmployee@editmyaccount');
Route::get('avatars/{name}', 'CreateUserEmployee@load');
Auth::routes();
Route::get('/',function(){
	return view('home');
});
Route::get('/profile/api/division/{id}','HomeController@division');
Route::get('/api/division/{id}','HomeController@division');
Route::get('/feedback/{id}','feedback\Usersform@form');
Route::post('/feedback/save','feedback\Usersform@formsave');

Route::get('/allres','feedback\Usersform@all');


Route::group(['prefix' => 'company'],function()
{
   Route::resource('/', 'companyController');
  
   Route::post('/search', 'companyController@search')->name('employees.search');
   Route::get('avatars/{name}', 'companyController@load');
   Route::get('/{id}', 'companyController@show');
});

Route::group(['prefix' => 'admin'],function()
{
Route::get('/employee-management/api/division/{id}','HomeController@division');
Route::get('/', 'DashboardController@index');
// Route::get('/system-management/{option}', 'SystemMgmtController@index');
Route::get('/profile', 'ProfileController@index');

Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');
Route::resource('user-management', 'UserManagementController');
Route::resource('company-management', 'CompanyManagementController');
Route::get('company-management/disactive/{id}', 'CompanyManagementController@disactive')->name('company-management.disactive');

Route::resource('employee-management', 'EmployeeManagementController');
Route::post('employee-management/search', 'EmployeeManagementController@search')->name('employee-management.search');

Route::resource('advancesearch', 'advancesearch');
Route::post('advancesearch/search', 'advancesearch@search')->name('advancesearch.search');

Route::resource('system-management/department', 'DepartmentController');
Route::post('system-management/department/search', 'DepartmentController@search')->name('department.search');

Route::resource('system-management/division', 'DivisionController');
Route::post('system-management/division/search', 'DivisionController@search')->name('division.search');

Route::resource('system-management/country', 'CountryController');
Route::post('system-management/country/search', 'CountryController@search')->name('country.search');

Route::resource('system-management/state', 'StateController');
Route::post('system-management/state/search', 'StateController@search')->name('state.search');

Route::resource('system-management/city', 'CityController');
Route::post('system-management/city/search', 'CityController@search')->name('city.search');

Route::get('system-management/report', 'ReportController@index');
Route::post('system-management/report/search', 'ReportController@search')->name('report.search');
Route::post('system-management/report/excel', 'ReportController@exportExcel')->name('report.excel');
Route::post('system-management/report/pdf', 'ReportController@exportPDF')->name('report.pdf');

Route::get('avatars/{name}', 'EmployeeManagementController@load');
Route::get('download/cvs/{name}', 'EmployeeManagementController@download');
//edits

Route::resource('system-management/degree', 'DegreeController');
Route::resource('system-management/position', 'PositionController');
Route::resource('system-management/social', 'socialController');

//feedback
Route::resource('feedback', 'feedback\FeedManegmentController');
Route::get('sendform/{id}', 'feedback\FeedManegmentController@sendnotificationform');
Route::post('makenotification', 'feedback\NotificationController@makenotification');

});

/*
* langauge swicher
*/
Route::post('/langauge', array(
    'Middleware' => 'langaugeSwitcher',
    'uses' => 'LangaugeController@langauge',
    'as'   => 'langaugea'));