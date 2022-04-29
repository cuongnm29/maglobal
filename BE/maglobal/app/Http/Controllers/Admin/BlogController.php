<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBlogRequest;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('langid',app()->getLocale())->get();  
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        abort_if(Gate::denies('blog_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::treeNews();
        return view('admin.blog.create', compact('categories'));
    }

    public function store(StoreBlogRequest $request)
    {
        abort_if(Gate::denies('blog_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request['slug']=Str::slug($request->title, '-');
        Blog::create($request->all());
        return redirect()->route('admin.blog.index');
    }

    public function edit(Blog $blog)
    {
        abort_if(Gate::denies('blog_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::treeNews();
        return view('admin.blog.edit', compact( 'blog','categories'));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $request['slug']=Str::slug($request->title, '-');
        $blog->update($request->all());

        return redirect()->route('admin.blog.index');
    }
    public function destroy(Blog $blog)
    {
        abort_if(Gate::denies('blog_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blog->delete();

        return back();
    }

    public function massDestroy(MassDestroyBlogRequest $request)
    {
        Blog::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
