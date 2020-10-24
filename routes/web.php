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

use App\Genre;
use App\Http\Resources\GenreResource;
use App\Http\Resources\SerieResource;
use App\Serie;

Auth::routes();


Route::get('/', 'MainController@index')->name('home');

Route::get('/serie/{id}', 'SerieController@show')->name('serie.show');

Route::get('/episode/{id}', 'EpisodeController@show')->name('episode.show');


Route::get('/', 'HomeController@index')->name('home.index');

Route::get('/genre/{idJeu}/assos','GenreController@assoSeries')->name('series.asso_genre');

Route::post('/genre/{id}/assos','GenreController@store_asso_series')->name('genre.store_asso_series');

Route::get('/dernieressorties', 'HomeController@recent')->name('home.derniereSortie');

Route::get('/toptendance', 'HomeController@top')->name('home.topTendances');

Route::get('/categorie', 'HomeController@cat')->name('home.categorie');

Route::get('/administration', 'HomeController@admin')->name('home.admin');

Route::get('/serie/{id}/editComment', 'CommentaireController@edit')->name('editComment');

Route::post('/serie/{id}/update', 'CommentaireController@update')->name('updateCommentaire');

Route::get('/serie/{id}/unvalid', 'CommentaireController@unValid')->name('unvalidCommentaire');

Route::get('/serie/{id}/valid', 'CommentaireController@valid')->name('validCommentaire');

Route::get('/serie/{id}/validAdmin', 'CommentaireController@validAdmin')->name('validCommentaireAdmin');

Route::post('/serie/{id}/create', 'CommentaireController@store')->name('creerCommentaire');

Route::get('/serie/{id}/destroy', 'CommentaireController@destroy')->name('deleteCommentaire');

Route::get('/serie/{id}/destroyUserSpace', 'CommentaireController@destroyUserSpace')->name('deleteCommentaireUserSpace');

Route::get('/user/{id}', 'UserController@index')->name('accueilUser');

Route::get('/serie/{id}/serieSeen', 'UserController@serieVue')->name('serieSeen');

Route::get('/serie/{id}/episodeSeen', 'UserController@episodeVu')->name('episodeSeen');

Route::get('/serie/{id}/saisonSeen/{num}', 'UserController@saisonVue')->name('saisonSeen');

Route::post('/serie/{id}/ajouterAvis', 'SerieController@ajouterAvis')->name('ajouterAvis');

Route::get('/serie/{id}/editAvis', 'SerieController@editAvis')->name('editAvis');

Route::get('/serie/{id}/deleteAvis', 'SerieController@deleteAvis')->name('deleteAvis');

Route::post('/serie/{id}/majAvis', 'SerieController@majAvis')->name('majAvis');
