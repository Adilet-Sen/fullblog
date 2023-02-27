<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubsController extends Controller
{
    public function store(SubsStoreRequest $request)
    {
        dd($request->all());
    }
}
