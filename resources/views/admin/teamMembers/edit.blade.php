@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.teamMember.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.team-members.update", [$teamMember->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.teamMember.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $teamMember->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teamMember.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="designation">{{ trans('cruds.teamMember.fields.designation') }}</label>
                <input class="form-control {{ $errors->has('designation') ? 'is-invalid' : '' }}" type="text" name="designation" id="designation" value="{{ old('designation', $teamMember->designation) }}">
                @if($errors->has('designation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('designation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teamMember.fields.designation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bio">{{ trans('cruds.teamMember.fields.bio') }}</label>
                <textarea class="form-control {{ $errors->has('bio') ? 'is-invalid' : '' }}" name="bio" id="bio">{{ old('bio', $teamMember->bio) }}</textarea>
                @if($errors->has('bio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teamMember.fields.bio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.teamMember.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teamMember.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook_url">{{ trans('cruds.teamMember.fields.facebook_url') }}</label>
                <input class="form-control {{ $errors->has('facebook_url') ? 'is-invalid' : '' }}" type="text" name="facebook_url" id="facebook_url" value="{{ old('facebook_url', $teamMember->facebook_url) }}">
                @if($errors->has('facebook_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teamMember.fields.facebook_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkedin_url">{{ trans('cruds.teamMember.fields.linkedin_url') }}</label>
                <input class="form-control {{ $errors->has('linkedin_url') ? 'is-invalid' : '' }}" type="text" name="linkedin_url" id="linkedin_url" value="{{ old('linkedin_url', $teamMember->linkedin_url) }}">
                @if($errors->has('linkedin_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('linkedin_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teamMember.fields.linkedin_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram_url">{{ trans('cruds.teamMember.fields.instagram_url') }}</label>
                <input class="form-control {{ $errors->has('instagram_url') ? 'is-invalid' : '' }}" type="text" name="instagram_url" id="instagram_url" value="{{ old('instagram_url', $teamMember->instagram_url) }}">
                @if($errors->has('instagram_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teamMember.fields.instagram_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.teamMember.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TeamMember::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $teamMember->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teamMember.fields.status_helper') }}</span>
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
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.team-members.storeMedia') }}',
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
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($teamMember) && $teamMember->photo)
      var file = {!! json_encode($teamMember->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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