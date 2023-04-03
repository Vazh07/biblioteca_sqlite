<?php
require_once('./controllers/authorController.php');
require_once('./controllers/bookController.php');
require_once('./controllers/publisherController.php');

Route::get('/',function() { 
    return view('main');
});
Route::get('main',function() { 
    return view('main');
});
Route::resource('author','authorController');
Route::resource('book','bookController');
Route::resource('publisher','publisherController');

Route::dispatch();
?>
