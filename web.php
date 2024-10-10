<?php

USE App\Controllers\Controller;
USE App\Routes\Route;

// Main
Route::get('/',[Controller::class,'author']);
Route::get('/genre',[Controller::class,'genre']);
Route::get('/book',[Controller::class,'book']);

// Author
Route::get('/create_author_page',[Controller::class,'create_author_page']);
Route::post('/create_author',[Controller::class,'create_author']);

Route::post('/delete_author',[Controller::class,'delete_author']);

Route::post('/edit_author_page',[Controller::class,'edit_author_page']);
Route::post('/edit_author',[Controller::class,'edit_author']);

// Genres
Route::get('/create_genre_page',[Controller::class,'create_genre_page']);
Route::post('/create_genre',[Controller::class,'create_genre']);

Route::post('/delete_genre',[Controller::class,'delete_genre']);

Route::post('/edit_genre_page',[Controller::class,'edit_genre_page']);
Route::post('/edit_genre',[Controller::class,'edit_genre']);



// Books
Route::get('/create_book_page',[Controller::class,'create_book_page']);
Route::post('/create_book',[Controller::class,'create_book']);

Route::post('/delete_book',[Controller::class,'delete_book']);

Route::post('/edit_book_page',[Controller::class,'edit_book_page']);
Route::post('/edit_book',[Controller::class,'edit_book']);

?>