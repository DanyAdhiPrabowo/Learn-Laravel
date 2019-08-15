<?php

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


/*----------- ROUTE WITHOUT CONTROLLER -------------*/
// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/about', function () {
//     $nama = "Dany Adhi Prabowo";
//     return view('about', ['name'=>$nama]);
// });



/*----------- ROUTE with CONTROLLER -------------*/
Route::get('/', "PagesController@home");
Route::get('/about', "PagesController@about");

Route::get('/mahasiswa', "MahasiswaController@index");


//======Route Students======//
// Route::get('/students', "StudentsController@index");
// Route::get('/students/create', "StudentsController@create");
// Route::get('/students/{student}', "StudentsController@show");
// Route::post('/students', "StudentsController@store");
// Route::delete('/students/{student}', "StudentsController@destroy");
// Route::get('/students/{student}/edit', "StudentsController@edit");
// Route::patch('/students/{student}', "StudentsController@update");

Route::resource('students', "StudentsController");  //Route line 35-41 bisa diganti dng 1 baris ini.