<?php

namespace App\Http\Controllers\Backend\Country;

use App\Helpers\DirectorsIndexView;
use App\Helpers\ViewDatabaseColumnHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Director\DirectorSearchRequest;
use App\Models\Country;
use App\Models\Director;
use App\Services\Director\DirectorService;

/**
 * Class CountryController
 */
class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::paginate(5);

        return view('countries.index', ['countries' => $countries]);
    }
}
