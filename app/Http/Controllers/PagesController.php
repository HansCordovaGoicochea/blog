<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use Illuminate\Http\Request;

class PagesController extends Controller
{


    /**
     * PagesController constructor.
     */
    public function __construct()
    {
//        $this->middleware('example', ['only' => ['home']]);
    }

    public function home(){
        return view('home');
    }

    public function saludo($nombre = 'Invitado'){
        $consolas =[
            "sadasdsa",
            "fsgfdgfdg",
            "sdfdsfdsf"
        ];
        $deportes =[
            "sadasadssdsa",
            "fsgfdgfdasdag",
            "sdfdsfdsfasda"
        ];

        return view('saludo', compact('nombre', 'consolas', 'deportes'));
    }
}
