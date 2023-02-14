<?php

namespace App\Http\Controllers\Backend\Director;

use App\Helpers\DirectorsIndexView;
use App\Helpers\ViewDatabaseColumnHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Director\DirectorSearchRequest;
use App\Models\Director;
use App\Services\Director\DirectorService;

/**
 * Class DirectorController
 */
class DirectorController extends Controller
{
    private $directorService;

    public function __construct(DirectorService $directorService)
    {
        $this->directorService = $directorService;
    }

    public function index()
    {
        $directors = Director::sortable()->paginate(5);
        $columns = (new ViewDatabaseColumnHelper(DirectorsIndexView::$columns))->getColumns();

        return view('director.index', ['directors' => $directors, 'columns' => $columns]);
    }

    public function filter(DirectorSearchRequest $request)
    {
        $directors =  Director::where('firstname', 'like', '%' . $request->firstname . '%')->paginate(5);
        $columns = (new ViewDatabaseColumnHelper(DirectorsIndexView::$columns))->getColumns();
        return view('director.index', ['directors' => $directors, 'columns' => $columns]);
    }
}
