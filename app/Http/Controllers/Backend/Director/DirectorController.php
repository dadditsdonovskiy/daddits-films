<?php

namespace App\Http\Controllers\Backend\Director;

use App\Http\Controllers\Controller;
use App\Models\Director;
use Itstructure\GridView\DataProviders\EloquentDataProvider;
/**
 * Class DirectorController
 */
class DirectorController extends Controller
{
    public function index()
    {
        $dataProvider = new EloquentDataProvider(Director::query());
        return view('director.index', [
            'dataProvider' => $dataProvider
        ]);
    }
}
