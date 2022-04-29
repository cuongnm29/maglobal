<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribe;
use App\Http\Requests\StoreSubcribeRequest;
class SubcribleController extends Controller
{
    public function CreateSubcrible(StoreSubcribeRequest $request)
    {
        Subscribe::create($request->all() );
        return redirect()->route('home')->with('success','Thank you for subscribe');
    }
}
