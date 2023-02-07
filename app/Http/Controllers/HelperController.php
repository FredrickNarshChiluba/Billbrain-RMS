<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Helper;

class HelperController extends Controller
{
    function index(){
        Helper::test();
    }
}
