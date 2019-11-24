<?php
Route::group(['middleware' => 'web', 'prefix' => 'admin'],function() {
    Route::get('/', 'AdminController@index')->name('admin.login');
    Route::post('/authenticate','AdminController@authenticate')->name('admin.login.submit');
    Route::get('/dashboard','AdminController@dashboard')->name('admin.dashboard');
    Route::get('/dashboard/logout','AdminController@logout')->name('admin.dashboard.logout');

    //Voter List
     Route::get('/voter/list', 'AdminController@voterlist')->name('admin.voter.list');
     Route::any('/voter/edit/{edit}', 'AdminController@voteredit')->name('admin.voter.edit');

     Route::get('/vote/result', 'AdminController@voteresult')->name('admin.vote.result');
     
});
Route::get('/admin/markAsRead',function(){
    Auth::guard('admin')->user()->unreadNotifications->markAsRead();
});
