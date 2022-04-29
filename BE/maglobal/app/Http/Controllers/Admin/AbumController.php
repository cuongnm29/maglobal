<?php

namespace App\Http\Controllers\Admin;
use App\Abum;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAbumRequest;
use App\Http\Requests\StoreAbumRequest;
use App\Http\Requests\UpdateAbumRequest;
use Gate;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
class AbumController extends Controller
{
    public function index()
    {
         $abum =Abum::where('langid',app()->getLocale())->get(); 
        return view('admin.abum.index', compact('abum'));
    }

    public function create()
    {
        abort_if(Gate::denies('abum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.abum.create');
    }

    public function store(StoreAbumRequest $request)
    {
        $abum= Abum::create($request->all());
         foreach ($request->input('image', []) as $file) {
            $abum->addMedia(storage_path('app/public/gallery/' . $file))->toMediaCollection('image');
        }
        return redirect()->route('admin.abum.index');
    }
    public function edit(Abum $abum)
    {
        abort_if(Gate::denies('abum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.abum.edit', compact( 'abum'));
    }
    

    public function update(UpdateAbumRequest $request, Abum $abum)
    {
        $abum->update($request->all());
        foreach ($request->input('image', []) as $file) {
            $abum->addMedia(storage_path('app/public/gallery/' . $file))->toMediaCollection('image');
        }
        return redirect()->route('admin.abum.index');
    }
    public function destroy(Abum $abum)
    {
        abort_if(Gate::denies('abum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $abum->delete();

        return back();
    }

    public function massDestroy(MassDestroyAbumRequest $request)
    {
        Abum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function storeMedia(Request $request)
    {
        $path = storage_path('app/public/gallery/');
    
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
    
        $file = $request->file('file');
    
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
    
        $file->move($path, $name);
    
        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
   public function listMedia(Request $request){
       $id= $request->id;
        $data  = array();
        $media = DB::table('media')->where('model_id', '=', $id)->get();
        $index=0;
        foreach($media as $item){
            $data[] = [
                'url' => url("storage")."/".$item->id."/".$item->file_name,
                'size' => $item->size,
                'name' => $item->name,
            ]; 
            $index++;
        }
        return  $data;
   }
   public function deleteMedia(Request $request)
   {
       $filename =  $request->get('filename');
       Media::where('name',$filename)->delete();
       $path=storage_path('app/public/gallery/').$filename;
       if (file_exists($path)) {
           unlink($path);
       }
       return $filename;  
   }
}
