@extends('layouts.admin')
@section('content')
@can('site_setting_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.site-settings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.siteSetting.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'SiteSetting', 'route' => 'admin.site-settings.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.siteSetting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SiteSetting">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.siteSetting.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.siteSetting.fields.site_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.siteSetting.fields.site_logo') }}
                        </th>
                        <th>
                            {{ trans('cruds.siteSetting.fields.favicon') }}
                        </th>
                        <th>
                            {{ trans('cruds.siteSetting.fields.footer_text') }}
                        </th>
                        <th>
                            {{ trans('cruds.siteSetting.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.siteSetting.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.siteSetting.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.siteSetting.fields.facebook_url') }}
                        </th>
                        <th>
                            {{ trans('cruds.siteSetting.fields.linkedin_url') }}
                        </th>
                        <th>
                            {{ trans('cruds.siteSetting.fields.instagram_url') }}
                        </th>
                        <th>
                            {{ trans('cruds.siteSetting.fields.google_analytics_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.siteSetting.fields.loction_url') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siteSettings as $key => $siteSetting)
                        <tr data-entry-id="{{ $siteSetting->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $siteSetting->id ?? '' }}
                            </td>
                            <td>
                                {{ $siteSetting->site_name ?? '' }}
                            </td>
                            <td>
                                @if($siteSetting->site_logo)
                                    <a href="{{ $siteSetting->site_logo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $siteSetting->site_logo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($siteSetting->favicon)
                                    <a href="{{ $siteSetting->favicon->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $siteSetting->favicon->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $siteSetting->footer_text ?? '' }}
                            </td>
                            <td>
                                {{ $siteSetting->address ?? '' }}
                            </td>
                            <td>
                                {{ $siteSetting->phone ?? '' }}
                            </td>
                            <td>
                                {{ $siteSetting->email ?? '' }}
                            </td>
                            <td>
                                {{ $siteSetting->facebook_url ?? '' }}
                            </td>
                            <td>
                                {{ $siteSetting->linkedin_url ?? '' }}
                            </td>
                            <td>
                                {{ $siteSetting->instagram_url ?? '' }}
                            </td>
                            <td>
                                {{ $siteSetting->google_analytics_code ?? '' }}
                            </td>
                            <td>
                                {{ $siteSetting->loction_url ?? '' }}
                            </td>
                            <td>
                                @can('site_setting_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.site-settings.show', $siteSetting->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('site_setting_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.site-settings.edit', $siteSetting->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('site_setting_delete')
                                    <form action="{{ route('admin.site-settings.destroy', $siteSetting->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('site_setting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.site-settings.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-SiteSetting:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection