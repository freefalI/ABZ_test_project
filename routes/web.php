<?php


Route::get('positions/{id}/children','PositionController@children');
Route::get('table','EmployeeController@table');
Route::get('employees/{id}/children','EmployeeController@children');

Route::get('employees2','EmployeeController@index2');
Route::resource('employees','EmployeeController');
Route::resource('positions','PositionController');