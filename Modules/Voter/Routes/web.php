<?php

Route::group(['middleware' => 'web', 'prefix' => 'voter'],function() {
    Route::get('/', 'VoterController@index')->name('voter.login');
    Route::post('/authenticate','VoterController@authenticate')->name('voter.login.submit');
    Route::get('/dashboard','VoterController@dashboard')->name('voter.dashboard');
    Route::get('/dashboard/logout','VoterController@logout')->name('voter.dashboard.logout');
    Route::any('/register','VoterController@register')->name('voter.register');
    Route::get('/create-password/{id}','VoterController@createpassword')->name('voter.createpassword');
    Route::post('/create-password/post','VoterController@createpasswordpost')->name('voter.createpassword.post');
    Route::any('/vote','VoterController@vote')->name('voter.vote');
    Route::get('/profile','VoterController@profile')->name('voter.profile');
    Route::any('/profile/edit','VoterController@profileedit')->name('voter.profile.edit');
    Route::any('/profile/change-password','VoterController@changepassword')->name('voter.change.password');
    Route::any('/profile/new-password','VoterController@newpassword')->name('voter.new.password');
});

