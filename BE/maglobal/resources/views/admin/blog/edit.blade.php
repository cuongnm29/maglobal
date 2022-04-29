@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.blog.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.blog.update", [$blog->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('catid') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.blog.title_singular') }}*</label>
                <select id="catid" name="catid" class="form-control">
                    <option value="">{{ trans('cruds.blog.title_selection') }} </option>
                    @foreach ($categories as $cate)
                                @if($blog->catid==$cate->id)
                                    <option  selected value="{{$cate->id}}">{{$cate->name }}</option>
                                    @else
                                    <option   value="{{$cate->id}}">{{$cate->name }}</option>
                                @endif
                                @if(isset($cate->child))
                                    @foreach ($cate->child as $subchild)
                                        @if($blog->catid==$subchild->id)
                                            <option  selected value="{{$subchild->id}}">--{{$subchild->name }}</option>
                                        @else
                                            <option   value="{{$subchild->id}}">--{{$subchild->name }}</option>
                                        @endif
                                            @if(count($subchild->child))
                                                @foreach ($subchild->child as $subchildlv)
                                                    @if($blog->catid==$subchildlv->id)
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
                @if($errors->has('catid'))
                <em class="invalid-feedback">
                    {{ $errors->first('catid') }}
                </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.blog.fields.name') }}*</label>
                <input type="text" id="title" name="title" class="form-control"   value="{{ old('title', isset($blog) ? $blog->title : '') }}"
                    >
                @if($errors->has('title'))
                <em class="invalid-feedback">
                    {{ $errors->first('title') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.blog.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('summary') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.blog.fields.summary') }}*</label>
                <textarea id="summary" name="summary" class="form-control">{!! old('summary', isset($blog) ? $blog->summary : '')!!}</textarea>
                @if($errors->has('summary'))
                <em class="invalid-feedback">
                    {{ $errors->first('summary') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.blog.fields.summary_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.blog.fields.content') }}*</label>
                <textarea id="content" name="content" class="form-control">{!! old('content', isset($blog) ? $blog->content : '')!!}</textarea>
                @if($errors->has('content'))
                <em class="invalid-feedback">
                    {{ $errors->first('content') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.blog.fields.content_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('isorder') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.blog.fields.order') }}*</label>
                <input type="text" id="isorder" name="isorder" class="form-control" value="{{ old('isorder', isset($blog) ? $blog->isorder : '') }}"
                     >
                @if($errors->has('isorder'))
                <em class="invalid-feedback">
                    {{ $errors->first('isorder') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.blog.fields.order_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('pagetitle') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.blog.fields.pagetitle') }}</label>
                <input type="text" id="pagetitle" name="pagetitle" class="form-control"
                     >
                @if($errors->has('pagetitle'))
                <em class="invalid-feedback">
                    {{ $errors->first('pagetitle') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.blog.fields.pagetitle_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('keyword') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.blog.fields.keyword') }}</label>
                <input type="text" id="keyword" name="keyword" class="form-control"
                     >
                @if($errors->has('keyword'))
                <em class="invalid-feedback">
                    {{ $errors->first('keyword') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.blog.fields.keyword_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('meta') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.blog.fields.meta') }}</label>
                <input type="text" id="meta" name="meta" class="form-control"
                     >
                @if($errors->has('meta'))
                <em class="invalid-feedback">
                    {{ $errors->first('meta') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.blog.fields.meta_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                <label for="photo" required>{{ trans('cruds.blog.fields.photo') }}*</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{ old('photo', isset($blog) ? $blog->photo : '') }}">
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;"/>
                @if($errors->has('photo'))
                <em class="invalid-feedback">
                    {{ $errors->first('photo') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.blog.fields.photo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.blog.fields.status') }}
                </label>
                <select name="status" id="status" class="form-control select">
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>
                @if($errors->has('status'))
                <em class="invalid-feedback">
                    {{ $errors->first('status') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.blog.fields.status_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('ishome') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.blog.fields.ishome') }}
                </label>
                <select name="ishome" id="ishome" class="form-control select">
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>
                @if($errors->has('ishome'))
                <em class="invalid-feedback">
                    {{ $errors->first('ishome') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.blog.fields.status_helper') }}
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
@section('scripts')
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "#summary,#content",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
var route_prefix = "/laravel-filemanager";
lfm('lfm', 'image', {
    prefix: route_prefix
});
</script>

@stop