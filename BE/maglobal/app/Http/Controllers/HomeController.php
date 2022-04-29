<?php

namespace App\Http\Controllers;
use App\Mail;
use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use App\Banner;
use App\Setting;
use App\Category;
use App\Blog;
use App\Abum;
use Auth;
use App\Http\Resources\Admin\GalleryResource;
class HomeController  extends Controller
{
    
    public function index()
    {
        $categories = Category::where('parent_id', 0)->where("ismenu",1)->where('langid',app()->getLocale())->orderBy('isorder')->get();
        $catService = Category::where('parent_id', 0)->where("istype",3)->where('langid',app()->getLocale())->orderBy('isorder')->first();
        $catWorks = Category::where('parent_id', 0)->where("istype",5)->where('langid',app()->getLocale())->orderBy('isorder')->first();
        $catAbout = Category::where('parent_id', 0)->where("istype",2)->where('langid',app()->getLocale())->orderBy('isorder')->first();
        $catContact= Category::where('parent_id', 0)->where("istype",4)->orderBy('isorder')->first();
        $setting = Setting::where('langid',app()->getLocale())->first();
        $sliders = Banner::where('istype',1)->where('langid',app()->getLocale())->get();
        $services = Category::where('parent_id','<>', 0)->where('istype',3)->where("ismenu",1)->where('langid',app()->getLocale())->orderBy('isorder')->get();
        $abums = Abum::where('status',1)->orderBy('isorder')->where('langid',app()->getLocale())->get();
        $abouts =Blog::join('category', 'category.id', '=', 'blog.catid')->where('category.istype','2')->where('blog.ishome',1)->where('blog.langid',app()->getLocale())->select('blog.*','category.id as catid','category.slug as catslug')->get();
        $news =Blog::join('category', 'category.id', '=', 'blog.catid')->where('category.istype','1')->where('blog.ishome',1)->where('blog.langid',app()->getLocale())->select('blog.*','category.id as catid','category.slug as catslug, category.name as catname')->take(4)->get();
        return view('home',compact('categories','setting','sliders','services','abums','abouts','news','catService','catWorks','catAbout','catContact'));
    }
    
       public function details(Request $request)
    {
        $aboutid=$request->route('id');
        $categories = Category::where('parent_id', 0)->where("ismenu",1)->where('langid',app()->getLocale())->orderBy('isorder')->get();
        $setting = Setting::where('langid',app()->getLocale())->first();
        $services = Category::where('parent_id','<>', 0)->where('istype',3)->where("ismenu",1)->orderBy('isorder')->get();
        $abums = Abum::where('status',1)->orderBy('isorder')->where('langid',app()->getLocale())->get();
        $blog=Blog::where('id',$aboutid)->where('langid',app()->getLocale())->first();
       
        $abouts =Blog::join('category', 'category.id', '=', 'blog.catid')->where('category.istype','2')->where('blog.ishome',1)->where('blog.langid',app()->getLocale())->select('blog.*','category.id as catid','category.slug as catslug')->get();
        $news =Blog::join('category', 'category.id', '=', 'blog.catid')->where('category.istype','1')->where('blog.ishome',1)->where('blog.langid',app()->getLocale())->select('blog.*','category.id as catid','category.slug as catslug, category.name as catname')->take(4)->get();
        if (isset($blog)){
            $cat_blog= Category::where('id', $blog->catid)->where('langid',app()->getLocale())->orderBy('isorder')->first();
            return view('details',compact('categories','setting','services','abums','blog','abouts','news','cat_blog'));
        }
        return view('details',compact('categories','setting','services','abums','blog','abouts','news'));
    }
    public function getGallery(Request $request){
        $id=$request->route('id');
        $categories = Category::where('parent_id', 0)->where('langid',app()->getLocale())->where("ismenu",1)->orderBy('isorder')->get();
        $setting = Setting::where('langid',app()->getLocale())->first();
        $gallery = Abum::with(['media'])->where('id',$id)->where('langid',app()->getLocale())->first();
        $services = Category::where('parent_id','<>', 0)->where('istype',3)->where("ismenu",1)->where('langid',app()->getLocale())->orderBy('isorder')->get();
        $abums = Abum::where('status',1)->orderBy('isorder')->where('langid',app()->getLocale())->get();
        $abouts =Blog::join('category', 'category.id', '=', 'blog.catid')->where('blog.langid',app()->getLocale())->where('category.istype','2')->where('blog.ishome',1)->select('blog.*','category.id as catid','category.slug as catslug')->get();
        $news =Blog::join('category', 'category.id', '=', 'blog.catid')->where('blog.langid',app()->getLocale())->where('category.istype','1')->where('blog.ishome',1)->select('blog.*','category.id as catid','category.slug as catslug, category.name as catname')->take(4)->get();
        return view('gallery',compact('gallery','setting','categories','services','abums','abouts','news'));
        
    }
}
