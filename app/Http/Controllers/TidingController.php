<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tiding;

class TidingController extends Controller
{
    public function index()
    {
        $tidings = Tiding::paginate(10);
        return view('tidings.tiding', ['clearSearch'=>true,'tidings' => $tidings]);
    }
}
