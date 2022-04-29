@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.abum.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.abum.update', [$abum->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.abum.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control"
                    value="{{ old('name', isset($abum) ? $abum->name : '') }}" required>
                @if($errors->has('title'))
                <em class="invalid-feedback">
                    {{ $errors->first('name') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.abum.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.abum.fields.title') }}</label>
                <input type="text" id="title" name="title" class="form-control"
                    value="{{ old('title', isset($abum) ? $abum->title : '') }}">
                @if($errors->has('title'))
                <em class="invalid-feedback">
                    {{ $errors->first('title') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.abum.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.abum.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control">{!! old('description', isset($description) ? $abum->description : '')!!}</textarea>
                @if($errors->has('description'))
                <em class="invalid-feedback">
                    {{ $errors->first('description') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.abum.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('isorder') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.abum.fields.order') }}</label>
                <input type="text" id="isorder" name="isorder" class="form-control"
                    value="{{ old('isorder', isset($abum) ? $abum->isorder : '') }}">
                @if($errors->has('description'))
                <em class="invalid-feedback">
                    {{ $errors->first('isorder') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.abum.fields.order_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                <label for="photo" required>{{ trans('cruds.banners.fields.photo') }}</label>
                <div class="input-group">
                <div class="dropzone" id="file-dropzone" style="width:100%"></div>
                </div>
               
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
                <label for="status">{{ trans('cruds.abum.fields.status') }}
                </label>
                <select name="status" id="status" class="form-control select">
                    <option {{$abum->status==1 ?'selected':''}} value="1">Enable</option>
                    <option {{$abum->status==2 ?'selected':''}} value="2">Disable</option>
                </select>
                @if($errors->has('status'))
                <em class="invalid-feedback">
                    {{ $errors->first('status') }}
                </em>status
                @endif
                <p class="helper-block">
                    {{ trans('cruds.abum.fields.status_helper') }}
                </p>
            </div>
            <div>
                <input type="hidden" id="abumid" value='{{$abum->id}}'>
                <input type="hidden" name="langid" id="langid" value="{{ app()->getLocale()}}">
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
@section('scripts')
<script>
    // Turn off auto discovery
    Dropzone.autoDiscover = false;
    $(function () {
        // Attach dropzone on element
        $("#file-dropzone").dropzone({
            url: '{{ route('admin.abum.storeMedia') }}',
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
            $('form').append('<input type="hidden" name="image[]" value="' + response.name + '">')
            uploadedDocumentMap[file.name] = response.name
            },
            addRemoveLinks: true,
            removedfile: function(file) 
            {
                var name = file.name;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                    type: 'POST',
                    url: '{{ route('admin.abum.deleteMedia') }}',
                    data: {filename: name},
                    success: function (data){
                        console.log("File deleted successfully!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            init: function () {
                thisDropzone=this;
                $.get('{{ route('admin.abum.listMedia')}}',{id:'{{$abum->id}}'}
                
                , function(data) {
           
            $.each(data, function(key,value){
               
                var mockFile = { name: value.name, size: value.size ,url: value.url};
                
                thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                thisDropzone.options.thumbnail.call(thisDropzone, mockFile, mockFile.url);
            });
            
            });
            @if(isset($project) && $project->document)
                var files =
                {!! json_encode($project->document) !!}
                for (var i in files) {
                var file = files[i]
                this.options.addedfile.call(this, file)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="image[]" value="' + file.file_name + '">')
                }
            @endif
            }
        });
    });

</script>
@stop