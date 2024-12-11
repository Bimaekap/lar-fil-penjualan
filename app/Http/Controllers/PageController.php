<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //

    public function website()
    {
        $website = require 'frontend/index.html';
        return $website;
    }
}
