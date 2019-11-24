<?php
Route::group(['middleware' => 'web'], function()
{
    Route::any('/admin/nominee/create', 'NomineeController@create')->name('nominee.create');
    Route::get('/admin/nominee/list','NomineeController@list')->name('nominee.list');
    Route::any('/admin/nominee/edit/{id}','NomineeController@edit')->name('nominee.edit');
    Route::get('/admin/nominee/delete/{id}','NomineeController@remove')->name('nominee.remove');
});
