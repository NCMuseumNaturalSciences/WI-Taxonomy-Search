<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchPagesController extends Controller
{
    public function searchWildlifeInsightsTaxonomy()
    {
        return view('search.wi-taxonomy-search-vue');
    }



}
