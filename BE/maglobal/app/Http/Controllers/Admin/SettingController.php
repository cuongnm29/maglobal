<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySettingRequest;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::where('langid',app()->getLocale())->first();  
        return view('admin.setting.index', compact('setting'));
    }
    public static   function store(StoreSettingRequest $request)
    {
        abort_if(Gate::denies('setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $row = Setting::find($request['id']);
        if($row==null)
        {
                Setting::create($request->all());
        }
        else{
            $row->update($request->all());
        }
        return redirect()->route('admin.setting.index');
    }
}
