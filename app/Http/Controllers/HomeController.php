<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\isikonten;

class HomeController extends Controller
{
    public function index()
    {
        $isikonten = isikonten::take(6)->get();

        $data = [
            'isikonten' => $isikonten,
            'content' => 'home\home\index'
        ];

        return view('home\layouts\wrapper', $data);
    }
}

