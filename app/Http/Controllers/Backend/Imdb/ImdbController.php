<?php

namespace App\Http\Controllers\Backend\Imdb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImdbController extends Controller
{
    public function showSearchForm()
    {
        return view('imdb.search');
    }

    public function search(Request $request)
    {
        dd($request);
    }
}
