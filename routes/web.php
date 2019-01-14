<?php
Route::get('employees2','EmployeeController@index2');
Route::resource('employees','EmployeeController');
Route::resource('positions','PositionController');