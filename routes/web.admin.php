<?php

use Illuminate\Support\Facades\Route;


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users','UsersController');
    
});

Auth::routes();