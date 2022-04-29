@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.category.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.category.update", [$category->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group ">
                <label for="name">{{ trans('cruds.category.title_singular') }}</label>
                <select name="parentid" class="form-control">
              
                        <option  value="0"> {{ trans('cruds.category.title_selection') }}</option>
                            @foreach ($categories as $cate)
                                @if($category->parent_id==$cate->id)
                                    <option  selected value="{{$cate->id}}">{{$cate->name }}</option>
                                    @else
                                    <option   value="{{$cate->id}}">{{$cate->name }}</option>
                                @endif
                                @if(isset($cate->child))
                                    @foreach ($cate->child as $subchild)
                                        @if($category->parent_id==$subchild->id)
                                            <option  selected value="{{$subchild->id}}">--{{$subchild->name }}</option>
                                        @else
                                            <option   value="{{$subchild->id}}">--{{$subchild->name }}</option>
                                        @endif
                                            @if(count($subchild->child))
                                                @foreach ($subchild->child as $subchildlv)
                                                    @if($category->parent_id==$subchildlv->id)
                                                        <option selected value="{{$subchildlv->id}}">------{{$subchildlv->name }}</option>
                                                    @else
                                                        <option value="{{$subchildlv->id}}">------{{$subchildlv->name }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                            
                                    @endforeach
                                @endif
                            @endforeach
                </select>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.category.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control"
                value="{{ old('name', isset($category) ? $category->name : '') }}">
                @if($errors->has('name'))
                <em class="invalid-feedback">
                    {{ $errors->first('name') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.category.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.category.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control"
                value="{{ old('title', isset($category) ? $category->title : '') }}">
                @if($errors->has('name'))
                <em class="invalid-feedback">
                    {{ $errors->first('title') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.category.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="descriptions">{{ trans('cruds.category.fields.description') }}*</label>
                <input type="text" id="description" name="description" class="form-control"
                value="{{ old('description', isset($category) ? $category->description : '') }}">
                @if($errors->has('name'))
                <em class="invalid-feedback">
                    {{ $errors->first('description') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.category.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('istype') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.category.fields.type') }}
                </label>
                <select name="istype" id="istype" class="form-control select">
                    <option {{$category->istype==1 ?'selected':''}}  value="1">News</option>
                    <option {{$category->istype==2 ?'selected':''}} value="2">About Us</option>
                    <option  {{$category->istype==3 ?'selected':''}} value="3">Service</option>
                    <option {{$category->istype==4 ?'selected':''}} value="4">Contact Us</option>
                    <option {{$category->istype==5 ?'selected':''}} value="5">Gallery</option>
                </select>
                @if($errors->has('istype'))
                <em class="invalid-feedback">
                    {{ $errors->first('istype') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.category.fields.type_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('ismenu') ? 'has-error' : '' }}">
                <label for="ismenu">{{ trans('cruds.category.fields.menu') }}
                </label>
                <select name="ismenu" id="ismenu" class="form-control select">
                    <option {{$category->ismenu==1 ?'selected':''}}  value="1">Enable</option>
                    <option {{$category->ismenu==0 ?'selected':''}}  value="0">Disable</option>
                </select>
                @if($errors->has('ismenu'))
                <em class="invalid-feedback">
                    {{ $errors->first('ismenu') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.banners.fields.status_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('isorder') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.category.fields.order') }}*</label>
                <input type="text" id="isorder" name="isorder" class="form-control"
                    value="{{ old('isorder', isset($category) ? $category->isorder : '') }}" required>
                @if($errors->has('isorder'))
                <em class="invalid-feedback">
                    {{ $errors->first('isorder') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.category.fields.order_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                <label for="photo" required>{{ trans('cruds.banners.fields.photo') }}</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{ old('photo', isset($category) ? $category->photo : '') }}">
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;"/>
                @if($errors->has('photo'))
                <em class="invalid-feedback">
                    {{ $errors->first('photo') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.banners.fields.photo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.banners.fields.status') }}
                </label>
                <select name="status" id="status" class="form-control select">
                    <option {{$category->status==1 ?'selected':''}} value="1">Enable</option>
                    <option {{$category->status==0 ?'selected':''}} value="0">Disable</option>
                </select>
                @if($errors->has('status'))
                <em class="invalid-feedback">
                    {{ $errors->first('status') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.category.fields.status_helper') }}
                </p>
            </div>
            <div>
            <input type="hidden" name="langid" id="langid" value="{{ app()->getLocale()}}">
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
var route_prefix = "/laravel-filemanager";
lfm('lfm', 'image', {
    prefix: route_prefix
});
</script>

@stop