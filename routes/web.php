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

Route::get('home','HomeController@showWelcome');
Route::get('about','AboutController@showDetails');

Route::get('profile/{name}','ProfileController@showProfile');

Route::get('/', function () {
    return view('welcome');
});

//Route::get('about',function (){
//    return 'About Content';
//});

Route::get('about/directions',function (){
    return 'Direction go here';
});

Route::any('submit-form',function (){
    return 'Process Form';
});

Route::get('about/{theSubject}','AboutController@showSubject');

//Route::get('about/{theSubject}',function ($theSubject){
//    return $theSubject. ' content here';
//});

Route::get('about/{theArt}/{thePrice}',function ($theArt,$thePrice){
    return "The product : $theArt and have price is $thePrice ";
});

Route::get('where',function (){
   return Redirect::to('about/directions');
});

Route::get('/insert',function (){
    DB::insert('insert into posts(title,body) values (?,?)',['PHP with Laravel','laravel is the best framework']);
    return 'DONE';
});

Route::get('/read',function (){
    $result = DB::select('select * from posts where id = ?',[1]);
    foreach ($result as $post)
    {
        return $post->body;
    }
});

Route::get('update',function (){
    $updated = DB::update('update posts set title = "New Title hihi" where id > ?',[1]);
    return $updated;
});

Route::get('delete',function (){
    $deleted = DB::delete('delete from posts where id = ? ',[3]);
    return $deleted;
});
