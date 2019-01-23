<?php


Route::get('positions/{id}/children','PositionController@children');
Route::get('positions','PositionController@index');


Route::get('employees/table','EmployeesTableController@table');

Route::get('employees/{id}/children','EmployeesTableController@children');

Route::get('employees','EmployeesTableController@index');




// Route::resource('employees','EmployeeController');
// Route::resource('positions','PositionController');