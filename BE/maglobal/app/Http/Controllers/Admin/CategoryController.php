<?php
namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function index()
    {
        $allCategories = Category::tree()->where('langid',app()->getLocale());     
        return view('admin.category.index', compact('allCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::tree();
        return view('admin.category.create', compact('categories'));
    }

    public function store(StoreCategoryRequest $request)
    {
        abort_if(Gate::denies('category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request['slug']=Str::slug($request->name, '-');
        Category::create($request->all());
        return redirect()->route('admin.category.index');
    }

    public function edit(Category $category)
    {
        abort_if(Gate::denies('category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::tree();
        return view('admin.category.edit', compact( 'category','categories'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request['slug']=Str::slug($request->name, '-');
        $category->update($request->all());

        return redirect()->route('admin.category.index');
    }
    public function destroy(Category $category)
    {
        abort_if(Gate::denies('category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategoryRequest $request)
    {
        Category::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
