@extends('layouts.admin')
@section('content')
@can('project_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.projects.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.project.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Project', 'route' => 'admin.projects.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.project.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Project">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.project.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.slug') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.location') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.client_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.short_description') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.conclusion') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.gallery') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.gallery_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.gallery_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.video_url') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.year') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.site_area') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.project_space') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.total_manpower') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.estimate_cost') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $key => $project)
                        <tr data-entry-id="{{ $project->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $project->id ?? '' }}
                            </td>
                            <td>
                                {{ $project->category->name ?? '' }}
                            </td>
                            <td>
                                {{ $project->title ?? '' }}
                            </td>
                            <td>
                                {{ $project->slug ?? '' }}
                            </td>
                            <td>
                                {{ $project->location ?? '' }}
                            </td>
                            <td>
                                {{ $project->client_name ?? '' }}
                            </td>
                            <td>
                                {{ $project->short_description ?? '' }}
                            </td>
                            <td>
                                {{ $project->conclusion ?? '' }}
                            </td>
                            <td>
                                @if($project->gallery)
                                    <a href="{{ $project->gallery->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $project->gallery->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($project->gallery_1)
                                    <a href="{{ $project->gallery_1->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $project->gallery_1->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($project->gallery_2)
                                    <a href="{{ $project->gallery_2->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $project->gallery_2->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $project->video_url ?? '' }}
                            </td>
                            <td>
                                {{ $project->year ?? '' }}
                            </td>
                            <td>
                                {{ $project->site_area ?? '' }}
                            </td>
                            <td>
                                {{ $project->project_space ?? '' }}
                            </td>
                            <td>
                                {{ $project->total_manpower ?? '' }}
                            </td>
                            <td>
                                {{ $project->estimate_cost ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Project::STATUS_SELECT[$project->status] ?? '' }}
                            </td>
                            <td>
                                @can('project_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.projects.show', $project->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('project_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.projects.edit', $project->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('project_delete')
                                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('project_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.projects.massDestroy') }}",
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
  let table = $('.datatable-Project:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection