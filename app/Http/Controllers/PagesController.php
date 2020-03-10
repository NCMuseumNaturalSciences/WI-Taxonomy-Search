<?php


namespace App\Http\Controllers;
use Response;
use DB;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.landing');
    }


}
