@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.banners.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.banner.update", [$banner->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.banners.fields.name') }}*</label>
                <input type="text" id="title" name="title" class="form-control"
                    value="{{ old('title', isset($banner) ? $banner->title : '') }}" required>
                @if($errors->has('title'))
                <em class="invalid-feedback">
                    {{ $errors->first('title') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.banners.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.banners.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control">{!! old('description', isset($banner) ? $banner->description : '')!!}</textarea>

              
                @if($errors->has('description'))
                <em class="invalid-feedback">
                    {{ $errors->first('description') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.banners.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.banners.fields.link') }}</label>
                <input type="text" id="link" name="link" class="form-control"
                    value="{{ old('description', isset($banner) ? $banner->link : '') }}">
                @if($errors->has('description'))
                <em class="invalid-feedback">
                    {{ $errors->first('link') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.banners.fields.link_helper') }}
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
                    <input id="thumbnail" class="form-control" type="text" name="photo"  value="{{ old('photo', isset($banner) ? $banner->photo : '') }}">
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
            <div class="form-group {{ $errors->has('istype') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.banners.fields.type') }}
                </label>
                <select name="istype" id="istype" class="form-control select">
                    <option value="1" {{$banner->istype==1 ?'selected':''}}>Banner</option>
                    <option value="2" {{$banner->istype==2 ?'selected':''}}>Adv</option>
                </select>
                @if($errors->has('status'))
                <em class="invalid-feedback">
                    {{ $errors->first('services') }}
                </em>status
                @endif
                <p class="helper-block">
                    {{ trans('cruds.banners.fields.status_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('istype') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.banners.fields.type') }}
                </label>
                <select name="istype" id="istype" class="form-control select">
                    <option {{$banner->istype==1 ?'selected':''}} value="1">Banner</option>
                    <option {{$banner->istype==2 ?'selected':''}}value="2">Adv</option>
                </select>
                @if($errors->has('status'))
                <em class="invalid-feedback">
                    {{ $errors->first('services') }}
                </em>status
                @endif
                <p class="helper-block">
                    {{ trans('cruds.banners.fields.status_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.banners.fields.status') }}
                </label>
                <select name="status" id="status" class="form-control select">
                    <option {{$banner->status==1 ?'selected':''}} value="1">Enable</option>
                    <option {{$banner->status==2 ?'selected':''}} value="2">Disable</option>
                </select>
                @if($errors->has('status'))
                <em class="invalid-feedback">
                    {{ $errors->first('services') }}
                </em>status
                @endif
                <p class="helper-block">
                    {{ trans('cruds.banners.fields.status_helper') }}
                </p>
            </div>
            <div>
                
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "#description",
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