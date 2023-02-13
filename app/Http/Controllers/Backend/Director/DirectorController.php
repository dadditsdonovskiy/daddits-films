<?php

namespace App\Http\Controllers\Backend\Director;

use App\Helpers\DirectorsIndexView;
use App\Helpers\ViewDatabaseColumnHelper;
use App\Http\Controllers\Controller;
use App\Models\Director;

/**
 * Class DirectorController
 */
class DirectorController extends Controller
{
    public function index()
    {
        $directors = Director::sortable()->paginate(1);
        $columns = (new ViewDatabaseColumnHelper(DirectorsIndexView::$columns))->getColumns();

        return view('director.index', ['directors' => $directors, 'columns' => $columns]);
    }
}
