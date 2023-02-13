<?php

namespace App\Http\Controllers\Backend\Director;

use App\Helpers\DirectorsIndexView;
use App\Helpers\ViewDatabaseColumnHelper;
use App\Http\Controllers\Controller;
use App\Models\Director;
use App\Services\Director\DirectorService;
use Illuminate\Http\Request;
use App\Filters\Director\DirectorFilter;
use App\Filters\Director\DirectorSearch;

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
        $directors = Director::sortable()->paginate(1);
        $columns = (new ViewDatabaseColumnHelper(DirectorsIndexView::$columns))->getColumns();

        return view('director.index', ['directors' => $directors, 'columns' => $columns]);
    }

    public function filter(Request $request, DirectorFilter $receiptFilters, DirectorSearch $receiptSearch)
    {
        $perPage = 1;
        $query = $this->directorService->getDirectorsListQuery($receiptFilters, $receiptSearch);
        $receipts = $query->paginate($perPage);
        $a = 1;
    }

}
