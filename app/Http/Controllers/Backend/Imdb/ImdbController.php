<?php

namespace App\Http\Controllers\Backend\Imdb;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Imdb\SearchByTitleRequest;
use App\Imdb\ImdbTitle;
use App\Services\Imdb\ImdbService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Imdb\Config;
use Imdb\Title;
use Imdb\TitleSearch;

/**
 * Class ImdbController
 */
class ImdbController extends Controller
{
    public function showSearchForm()
    {
        return view('imdb.search');
    }

    /**
     * @param SearchByTitleRequest $request
     * @return Application|Factory|View
     */
    public function search(SearchByTitleRequest $request)
    {
        $results = [];
        $config = new Config();
        $config->language = 'En-en';
        $search = new TitleSearch($config);
        $films = $search->search($request->title, array(\Imdb\TitleSearch::MOVIE));
        foreach ($films as $key => $film) {
            /* @var $film Title */
            $results[] = ['title' => $film->title(), 'year' => $film->year(), 'imdbId' => $film->imdbid()];
        }

        return view('imdb.results-by-title', ['films' => $results]);
    }

    /**
     * @param $id
     * @param ImdbService $service
     * @return Application|Factory|View
     */
    public function filmDetails($id, ImdbService $service): Factory|View|Application
    {
        $filmInfo = $service->getFilmDetailsByImdbId($id);

        return view('imdb.film-data', ['filmInfo' => $filmInfo]);
    }
}
