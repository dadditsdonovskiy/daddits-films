<?php

namespace App\Http\Controllers\Backend\Film;

use App\Exceptions\GeneralException;
use App\Helpers\FilmsIndexView;
use App\Helpers\ViewDatabaseColumnHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Film\StoreFilmRequest;
use App\Models\Director;
use App\Models\Film;
use App\Services\Film\CreateFilmService;
use App\Services\Film\SearchFilmService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Backend\Film\FilmSearchRequest;

/**
 * Class FilmController
 */
class FilmController extends Controller
{
    private $filmSearchService;

    /**
     * FilmController constructor.
     * @param SearchFilmService $filmSearchService
     */
    public function __construct(SearchFilmService $filmSearchService)
    {
        $this->filmSearchService = $filmSearchService;
    }
    public function index()
    {
        $films = Film::all()->toArray();
        $films = Film::sortable()->filter($films)->byOrder(
            'created_at',
            'desc',
            'id'
        )
            ->paginate(10);
        $columns = (new ViewDatabaseColumnHelper(FilmsIndexView::$columns))->getColumns();

        return view('film.index', ['films' => $films, 'columns' => $columns]);
    }

    /**
     * @param FilmSearchRequest $request
     * @return Application|Factory|View
     */
    public function filter(FilmSearchRequest $request): Factory|View|Application
    {
        $perPage =  5;
        $filmsQuery = $this->filmSearchService->getQuery($request->only(['title', 'description', 'id']));
        $films = $filmsQuery->paginate($perPage);
        $columns = (new ViewDatabaseColumnHelper(FilmsIndexView::$columns))->getColumns();
        return view('film.index', ['films' => $films, 'columns' => $columns]);
    }

    /**
     * @return Application|Factory|View
     */
    public function showNewForm()
    {
        $directors = Director::select(
            DB::raw("CONCAT(firstname,' ',lastname) AS name"), 'id')
            ->pluck('name', 'id');
        return view('film.create', ['directors' => $directors]);
    }

    /**
     * @param StoreFilmRequest $request
     * @param CreateFilmService $createFilmService
     * @return mixed
     * @throws GeneralException
     */
    public function saveFilm(StoreFilmRequest $request, CreateFilmService $createFilmService)
    {
        $createFilmService->create($request->all());
        return redirect()->route('films.index')->withSuccess('Film was successfully added');
    }
}
