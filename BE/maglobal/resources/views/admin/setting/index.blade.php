@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.setting.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.setting.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control"   value="{{ old('email', isset($setting) ? $setting->email : '') }}"
                    >
                @if($errors->has('email'))
                <em class="invalid-feedback"> 

                    {{ $errors->first('email') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.setting.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('openhour') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.setting.fields.openhour') }}*</label>
                <input type="text" id="openhour" name="openhour" class="form-control" value="{{ old('openhour', isset($setting) ? $setting->openhour : '')}}">
                @if($errors->has('openhour'))
                <em class="invalid-feedback">
                    {{ $errors->first('openhour') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.setting.fields.openhour_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">{{ trans('cruds.setting.fields.address') }}*</label>
                <input type="text" id="address" name="address" class="form-control" value="{{old('address', isset($setting) ? $setting->address: '')}}">
                @if($errors->has('address'))
                <em class="invalid-feedback">
                    {{ $errors->first('address') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.setting.fields.address_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.setting.fields.phone') }}*</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($setting) ? $setting->phone : '') }}"
                     >
                @if($errors->has('phone'))
                <em class="invalid-feedback">
                    {{ $errors->first('phone') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.setting.fields.phone_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('video') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.setting.fields.video') }}</label>
                <input type="text" id="video" name="video" class="form-control"
                value="{{ old('video', isset($setting) ? $setting->video : '') }}">
                @if($errors->has('video'))
                <em class="invalid-feedback">
                    {{ $errors->first('video') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.setting.fields.video_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('map') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.setting.fields.map') }}</label>
                <input type="text" id="map" name="map" class="form-control"
                value="{{ old('map', isset($setting) ? $setting->map : '') }}">
                @if($errors->has('map'))
                <em class="invalid-feedback">
                    {{ $errors->first('map') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.setting.fields.map_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.setting.fields.facebook') }}</label>
                <input type="text" id="facebook" name="facebook" class="form-control"
                value="{{ old('facebook', isset($setting) ? $setting->facebook : '') }}">
                @if($errors->has('facebook'))
                <em class="invalid-feedback">
                    {{ $errors->first('facebook') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.setting.fields.facebook_helper') }}
                </p>
            </div>
            
            <div class="form-group {{ $errors->has('twitter') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.setting.fields.twitter') }}</label>
                <input type="text" id="twitter" name="twitter" class="form-control"
                value="{{ old('twitter', isset($setting) ? $setting->twitter : '') }}">
                @if($errors->has('twitter'))
                <em class="invalid-feedback">
                    {{ $errors->first('twitter') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.setting.fields.twitter_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('linkedin') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.setting.fields.linkedin') }}</label>
                <input type="text" id="linkedin" name="linkedin" class="form-control"
                value="{{ old('linkedin', isset($setting) ? $setting->linkedin : '') }}">
                @if($errors->has('linkedin'))
                <em class="invalid-feedback">
                    {{ $errors->first('linkedin') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.setting.fields.linkedin_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                <label for="photo" required>{{ trans('cruds.setting.fields.logo') }}*</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="logo" value="{{ old('logo', isset($setting) ? $setting->logo : '') }}">
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;"/>
                @if($errors->has('logo'))
                <em class="invalid-feedback">
                    {{ $errors->first('logo') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.setting.fields.logo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.setting.fields.description') }}*</label>
                <textarea id="description" name="description" class="form-control">{!! old('description', isset($setting) ? $setting->description : '')!!}</textarea>
                @if($errors->has('description'))
                <em class="invalid-feedback">
                    {{ $errors->first('description') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.setting.fields.description_helper') }}
                </p>
            </div>
            <div>
            <input type="hidden" name="langid" id="langid" value="{{ app()->getLocale()}}">
            <input type="hidden" id="id" name="id" class="form-control" value="{{ old('id', isset($setting) ? $setting->id : '') }}"
                     >
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