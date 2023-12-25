<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteWordsRequest;
use App\Http\Requests\ReadRequest;
use App\Http\Requests\ShowDeleteWordFormRequest;

class RssController extends Controller
{
    public function __construct()
    {
        
    }

    /**
     * Show Delete Word Form
     *
     * @param ShowDeleteWordFormRequest $showDeleteWordFormRequest
     */
    public function showDeleteWordForm(){
        return view('showDeleteWordForm');
    }
}
