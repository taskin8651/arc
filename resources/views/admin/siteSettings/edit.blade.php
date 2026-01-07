@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.siteSetting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.site-settings.update", [$siteSetting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="site_name">{{ trans('cruds.siteSetting.fields.site_name') }}</label>
                <input class="form-control {{ $errors->has('site_name') ? 'is-invalid' : '' }}" type="text" name="site_name" id="site_name" value="{{ old('site_name', $siteSetting->site_name) }}">
                @if($errors->has('site_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.site_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_logo">{{ trans('cruds.siteSetting.fields.site_logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('site_logo') ? 'is-invalid' : '' }}" id="site_logo-dropzone">
                </div>
                @if($errors->has('site_logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.site_logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="favicon">{{ trans('cruds.siteSetting.fields.favicon') }}</label>
                <div class="needsclick dropzone {{ $errors->has('favicon') ? 'is-invalid' : '' }}" id="favicon-dropzone">
                </div>
                @if($errors->has('favicon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('favicon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.favicon_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="footer_text">{{ trans('cruds.siteSetting.fields.footer_text') }}</label>
                <input class="form-control {{ $errors->has('footer_text') ? 'is-invalid' : '' }}" type="text" name="footer_text" id="footer_text" value="{{ old('footer_text', $siteSetting->footer_text) }}">
                @if($errors->has('footer_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('footer_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.footer_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.siteSetting.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $siteSetting->address) }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.siteSetting.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $siteSetting->phone) }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.siteSetting.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $siteSetting->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook_url">{{ trans('cruds.siteSetting.fields.facebook_url') }}</label>
                <input class="form-control {{ $errors->has('facebook_url') ? 'is-invalid' : '' }}" type="text" name="facebook_url" id="facebook_url" value="{{ old('facebook_url', $siteSetting->facebook_url) }}">
                @if($errors->has('facebook_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.facebook_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkedin_url">{{ trans('cruds.siteSetting.fields.linkedin_url') }}</label>
                <input class="form-control {{ $errors->has('linkedin_url') ? 'is-invalid' : '' }}" type="text" name="linkedin_url" id="linkedin_url" value="{{ old('linkedin_url', $siteSetting->linkedin_url) }}">
                @if($errors->has('linkedin_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('linkedin_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.linkedin_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram_url">{{ trans('cruds.siteSetting.fields.instagram_url') }}</label>
                <input class="form-control {{ $errors->has('instagram_url') ? 'is-invalid' : '' }}" type="text" name="instagram_url" id="instagram_url" value="{{ old('instagram_url', $siteSetting->instagram_url) }}">
                @if($errors->has('instagram_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.instagram_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="google_analytics_code">{{ trans('cruds.siteSetting.fields.google_analytics_code') }}</label>
                <input class="form-control {{ $errors->has('google_analytics_code') ? 'is-invalid' : '' }}" type="text" name="google_analytics_code" id="google_analytics_code" value="{{ old('google_analytics_code', $siteSetting->google_analytics_code) }}">
                @if($errors->has('google_analytics_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('google_analytics_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.google_analytics_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="loction_url">{{ trans('cruds.siteSetting.fields.loction_url') }}</label>
                <textarea class="form-control {{ $errors->has('loction_url') ? 'is-invalid' : '' }}" name="loction_url" id="loction_url">{{ old('loction_url', $siteSetting->loction_url) }}</textarea>
                @if($errors->has('loction_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('loction_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteSetting.fields.loction_url_helper') }}</span>
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
    Dropzone.options.siteLogoDropzone = {
    url: '{{ route('admin.site-settings.storeMedia') }}',
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
      $('form').find('input[name="site_logo"]').remove()
      $('form').append('<input type="hidden" name="site_logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="site_logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($siteSetting) && $siteSetting->site_logo)
      var file = {!! json_encode($siteSetting->site_logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="site_logo" value="' + file.file_name + '">')
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
    Dropzone.options.faviconDropzone = {
    url: '{{ route('admin.site-settings.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="favicon"]').remove()
      $('form').append('<input type="hidden" name="favicon" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="favicon"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($siteSetting) && $siteSetting->favicon)
      var file = {!! json_encode($siteSetting->favicon) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="favicon" value="' + file.file_name + '">')
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