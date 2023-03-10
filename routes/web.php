<?php

use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\User\CreateController as UserCreateController;
use App\Http\Controllers\Backend\User\DeleteController as UserDeleteController;
use App\Http\Controllers\Backend\User\ListController as UserListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Film\FilmController;
use App\Http\Controllers\Backend\Director\DirectorController;
use App\Http\Controllers\Backend\Country\CountryController;
use App\Http\Controllers\Backend\Imdb\ImdbController;

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

Route::get('login', [LoginController::class, 'showLoginForm'])->name('loginForm');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::get('/', [UserListController::class, 'index']);
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        Route::group(
            ['prefix' => 'user'],
            function () {
                Route::get('/', [UserListController::class, 'index'])->name('users.index');
                Route::get('/create', [UserCreateController::class, 'showForm']);
                Route::post('/create', [UserCreateController::class, 'store']);
                Route::delete('/{user}', [UserDeleteController::class, 'delete']);
            }
        );
        Route::group(
            ['prefix' => 'film'],
            function () {
                Route::get('/', [FilmController::class, 'index'])->name('films.index');
                Route::get('/new', [FilmController::class, 'showNewForm'])->name('films.show.new.form');
                Route::get('filter', [FilmController::class, 'filter'])->name('films.filter');
                Route::post('/save', [FilmController::class, 'saveFilm'])->name('films.save');
                Route::delete('{id}', [FilmController::class, 'destroy'])->name('films.destroy');
            }
        );
        Route::group(
            ['prefix' => 'director'],
            function () {
                Route::get('/', [DirectorController::class, 'index'])->name('directors.index');
                Route::get('/filter', [DirectorController::class, 'filter'])->name('directors.filter');
                Route::get('/new', [DirectorController::class, 'showAddForm'])->name('directors.show.new.form');
                Route::post('save', [DirectorController::class, 'saveDirector'])->name('directors.save');
            }
        );
        Route::group(
            ['prefix' => 'country'],
            function () {
                Route::get('/', [CountryController::class, 'index'])->name('countries.index');
                Route::get('/filter', [CountryController::class, 'filter'])->name('countries.filter');

            }
        );

        Route::group(
            ['prefix' => 'imdb'],
            function () {
                Route::get('/', [ImdbController::class, 'showSearchForm'])->name('imdb.search.form');
                Route::get('/search', [ImdbController::class, 'search'])->name('imdb.getResult');
                Route::get('/details/{id}', [ImdbController::class, 'filmDetails'])->name('imdb.view.film.details');

            }
        );
    }
);


