@extends('layouts.admin')
@section('content')
@can('team_member_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.team-members.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.teamMember.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TeamMember', 'route' => 'admin.team-members.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.teamMember.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TeamMember">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.teamMember.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.teamMember.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.teamMember.fields.designation') }}
                        </th>
                        <th>
                            {{ trans('cruds.teamMember.fields.bio') }}
                        </th>
                        <th>
                            {{ trans('cruds.teamMember.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.teamMember.fields.facebook_url') }}
                        </th>
                        <th>
                            {{ trans('cruds.teamMember.fields.linkedin_url') }}
                        </th>
                        <th>
                            {{ trans('cruds.teamMember.fields.instagram_url') }}
                        </th>
                        <th>
                            {{ trans('cruds.teamMember.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teamMembers as $key => $teamMember)
                        <tr data-entry-id="{{ $teamMember->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $teamMember->id ?? '' }}
                            </td>
                            <td>
                                {{ $teamMember->name ?? '' }}
                            </td>
                            <td>
                                {{ $teamMember->designation ?? '' }}
                            </td>
                            <td>
                                {{ $teamMember->bio ?? '' }}
                            </td>
                            <td>
                                @if($teamMember->photo)
                                    <a href="{{ $teamMember->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $teamMember->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $teamMember->facebook_url ?? '' }}
                            </td>
                            <td>
                                {{ $teamMember->linkedin_url ?? '' }}
                            </td>
                            <td>
                                {{ $teamMember->instagram_url ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TeamMember::STATUS_SELECT[$teamMember->status] ?? '' }}
                            </td>
                            <td>
                                @can('team_member_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.team-members.show', $teamMember->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('team_member_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.team-members.edit', $teamMember->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('team_member_delete')
                                    <form action="{{ route('admin.team-members.destroy', $teamMember->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('team_member_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.team-members.massDestroy') }}",
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
  let table = $('.datatable-TeamMember:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection