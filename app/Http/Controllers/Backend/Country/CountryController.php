<?php

namespace App\Http\Controllers\Backend\Country;

use App\Helpers\CountriesIndexView;
use App\Helpers\ViewDatabaseColumnHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Country\DirectorSearchRequest;
use App\Models\Country;

/**
 * Class CountryController
 */
class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::sortable()->paginate(5);
        $columns = (new ViewDatabaseColumnHelper(CountriesIndexView::$columns))->getColumns();

        return view('countries.index', ['countries' => $countries, 'columns' => $columns]);
    }


    public function filter(DirectorSearchRequest $request)
    {
        $countries = Country::where('name', 'like', '%' . $request->name . '%')->paginate(5);
        $columns = (new ViewDatabaseColumnHelper(CountriesIndexView::$columns))->getColumns();
        return view('countries.index', ['countries' => $countries, 'columns' => $columns]);
    }
}
