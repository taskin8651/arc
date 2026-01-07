@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.project.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.projects.update", [$project->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="category_id">{{ trans('cruds.project.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id">
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $project->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.project.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $project->title) }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slug">{{ trans('cruds.project.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', $project->slug) }}">
                @if($errors->has('slug'))
                    <div class="invalid-feedback">
                        {{ $errors->first('slug') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="location">{{ trans('cruds.project.fields.location') }}</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', $project->location) }}">
                @if($errors->has('location'))
                    <div class="invalid-feedback">
                        {{ $errors->first('location') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_name">{{ trans('cruds.project.fields.client_name') }}</label>
                <input class="form-control {{ $errors->has('client_name') ? 'is-invalid' : '' }}" type="text" name="client_name" id="client_name" value="{{ old('client_name', $project->client_name) }}">
                @if($errors->has('client_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.client_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.project.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $project->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="short_description">{{ trans('cruds.project.fields.short_description') }}</label>
                <textarea class="form-control {{ $errors->has('short_description') ? 'is-invalid' : '' }}" name="short_description" id="short_description">{{ old('short_description', $project->short_description) }}</textarea>
                @if($errors->has('short_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.short_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="conclusion">{{ trans('cruds.project.fields.conclusion') }}</label>
                <input class="form-control {{ $errors->has('conclusion') ? 'is-invalid' : '' }}" type="text" name="conclusion" id="conclusion" value="{{ old('conclusion', $project->conclusion) }}">
                @if($errors->has('conclusion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('conclusion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.conclusion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gallery">{{ trans('cruds.project.fields.gallery') }}</label>
                <div class="needsclick dropzone {{ $errors->has('gallery') ? 'is-invalid' : '' }}" id="gallery-dropzone">
                </div>
                @if($errors->has('gallery'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gallery') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.gallery_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gallery_1">{{ trans('cruds.project.fields.gallery_1') }}</label>
                <div class="needsclick dropzone {{ $errors->has('gallery_1') ? 'is-invalid' : '' }}" id="gallery_1-dropzone">
                </div>
                @if($errors->has('gallery_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gallery_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.gallery_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gallery_2">{{ trans('cruds.project.fields.gallery_2') }}</label>
                <div class="needsclick dropzone {{ $errors->has('gallery_2') ? 'is-invalid' : '' }}" id="gallery_2-dropzone">
                </div>
                @if($errors->has('gallery_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gallery_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.gallery_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="video_url">{{ trans('cruds.project.fields.video_url') }}</label>
                <textarea class="form-control {{ $errors->has('video_url') ? 'is-invalid' : '' }}" name="video_url" id="video_url">{{ old('video_url', $project->video_url) }}</textarea>
                @if($errors->has('video_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('video_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.video_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="year">{{ trans('cruds.project.fields.year') }}</label>
                <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" type="text" name="year" id="year" value="{{ old('year', $project->year) }}">
                @if($errors->has('year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_area">{{ trans('cruds.project.fields.site_area') }}</label>
                <input class="form-control {{ $errors->has('site_area') ? 'is-invalid' : '' }}" type="text" name="site_area" id="site_area" value="{{ old('site_area', $project->site_area) }}">
                @if($errors->has('site_area'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_area') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.site_area_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_space">{{ trans('cruds.project.fields.project_space') }}</label>
                <input class="form-control {{ $errors->has('project_space') ? 'is-invalid' : '' }}" type="text" name="project_space" id="project_space" value="{{ old('project_space', $project->project_space) }}">
                @if($errors->has('project_space'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_space') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.project_space_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_manpower">{{ trans('cruds.project.fields.total_manpower') }}</label>
                <input class="form-control {{ $errors->has('total_manpower') ? 'is-invalid' : '' }}" type="text" name="total_manpower" id="total_manpower" value="{{ old('total_manpower', $project->total_manpower) }}">
                @if($errors->has('total_manpower'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_manpower') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.total_manpower_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="estimate_cost">{{ trans('cruds.project.fields.estimate_cost') }}</label>
                <input class="form-control {{ $errors->has('estimate_cost') ? 'is-invalid' : '' }}" type="text" name="estimate_cost" id="estimate_cost" value="{{ old('estimate_cost', $project->estimate_cost) }}">
                @if($errors->has('estimate_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('estimate_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.estimate_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.project.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Project::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $project->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.projects.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $project->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.galleryDropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="gallery"]').remove()
      $('form').append('<input type="hidden" name="gallery" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="gallery"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($project) && $project->gallery)
      var file = {!! json_encode($project->gallery) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="gallery" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    Dropzone.options.gallery1Dropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="gallery_1"]').remove()
      $('form').append('<input type="hidden" name="gallery_1" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="gallery_1"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($project) && $project->gallery_1)
      var file = {!! json_encode($project->gallery_1) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="gallery_1" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    Dropzone.options.gallery2Dropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="gallery_2"]').remove()
      $('form').append('<input type="hidden" name="gallery_2" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="gallery_2"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($project) && $project->gallery_2)
      var file = {!! json_encode($project->gallery_2) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="gallery_2" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection