<?php

namespace App\Http\Controllers\Backend\Director;

use App\Helpers\DirectorsIndexView;
use App\Helpers\ViewDatabaseColumnHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Director\CountrySearchRequest;
use App\Models\Director;
use App\Services\Director\SearchDirectorService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class DirectorController
 */
class DirectorController extends Controller
{
    private $directorSearchService;

    public function __construct(SearchDirectorService $directorSearchService)
    {
        $this->directorSearchService = $directorSearchService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        $directors = Director::sortable()->paginate(5);
        $columns = (new ViewDatabaseColumnHelper(DirectorsIndexView::$columns))->getColumns();
        return view('director.index', ['directors' => $directors, 'columns' => $columns]);
    }

    /**
     * @param CountrySearchRequest $request
     * @return Application|Factory|View
     */
    public function filter(CountrySearchRequest $request): Factory|View|Application
    {
        $perPage =  5;
        $directorsQuery = $this->directorSearchService->getQuery($request->only(['firstname', 'lastname', 'id']));
        $directors = $directorsQuery->paginate($perPage);
        $columns = (new ViewDatabaseColumnHelper(DirectorsIndexView::$columns))->getColumns();
        return view('director.index', ['directors' => $directors, 'columns' => $columns]);
    }
}
