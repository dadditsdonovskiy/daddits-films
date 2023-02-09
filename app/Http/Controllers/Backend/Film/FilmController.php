<?php

namespace App\Http\Controllers\Backend\Film;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Film\StoreFilmRequest;
use App\Models\Film;
use App\Services\Film\CreateFilmService;

/**
 * Class FilmController
 */
class FilmController extends Controller
{
    public function index () {
        $films = Film::all()->toArray();
        $films = Film::filter($films)->byOrder(
            'created_at',
            'desc',
            'id'
        )
            ->paginate(10);

        return view('film.index', ['films' => $films]);
    }

    public function showNewForm () {
        return view('film.create');
    }

    public function saveFilm(StoreFilmRequest $request, CreateFilmService $createFilmService)
    {
        $createFilmService->create($request->all());
        return redirect()->route('films.index')->withSuccess(__('alerts.backend.films.created'));
    }
}
