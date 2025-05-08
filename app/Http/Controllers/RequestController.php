<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pustaka;

class RequestController extends Controller
{
    public function index()
    {
        $buku = Pustaka::where('fp', '1')->get();

        return view('request.index', compact('buku'));
    }
}
