<?php

namespace App\Http\Controllers\Admin;


use App\Mail;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMailRequest;
use App\Http\Requests\StoreMailRequest;
use App\Http\Requests\UpdateMailRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
class HomeController  extends Controller
{
    public function index()
    {
        return view('home');
    }
}
