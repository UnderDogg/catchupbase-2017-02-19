<?php

namespace App\Http\Controllers\Frontend;

use Activity;
use App\Http\Controllers\Controller;
use Theme;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    public $theme = 'bootstrap';

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //Themify::set('bartheme');
        return view('frontend.index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }
}
