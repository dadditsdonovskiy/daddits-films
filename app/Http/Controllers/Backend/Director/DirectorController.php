<?php

namespace App\Http\Controllers\Backend\Director;

use App\Helpers\DirectorsIndexView;
use App\Helpers\ViewDatabaseColumnHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Director\DirectorSearchRequest;
use App\Http\Requests\Backend\Director\StoreDirectorRequest;
use App\Models\Director;
use App\Services\Director\CreateDirectorService;
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
        $directors = Director::all()->toArray();
        $directors = Director::sortable()->filter($directors)->byOrder(
            'created_at',
            'desc',
            'id'
        )
            ->paginate(5);
        $columns = (new ViewDatabaseColumnHelper(DirectorsIndexView::$columns))->getColumns();
        return view('director.index', ['directors' => $directors, 'columns' => $columns]);
    }

    /**
     * @param DirectorSearchRequest $request
     * @return Application|Factory|View
     */
    public function filter(DirectorSearchRequest $request): Factory|View|Application
    {
        $perPage =  5;
        $directorsQuery = $this->directorSearchService->getQuery($request->only(['firstname', 'lastname', 'id']));
        $directors = $directorsQuery->paginate($perPage);
        $columns = (new ViewDatabaseColumnHelper(DirectorsIndexView::$columns))->getColumns();
        return view('director.index', ['directors' => $directors, 'columns' => $columns]);
    }


    /**
     * @return Application|Factory|View
     */
    public function showAddForm() {
        return view('director.create');
    }


    public function saveDirector(StoreDirectorRequest $request, CreateDirectorService $createDirectorService)
    {
        $createDirectorService->create($request->all());
        return redirect()->route('directors.index')->withSuccess(__('alerts.backend.directors.created'));
    }
}
