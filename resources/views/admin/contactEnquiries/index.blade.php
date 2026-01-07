@extends('layouts.admin')
@section('content')
@can('contact_enquiry_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.contact-enquiries.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.contactEnquiry.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'ContactEnquiry', 'route' => 'admin.contact-enquiries.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.contactEnquiry.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ContactEnquiry">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.contactEnquiry.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactEnquiry.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactEnquiry.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactEnquiry.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactEnquiry.fields.message') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactEnquiry.fields.degination') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contactEnquiries as $key => $contactEnquiry)
                        <tr data-entry-id="{{ $contactEnquiry->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $contactEnquiry->id ?? '' }}
                            </td>
                            <td>
                                {{ $contactEnquiry->name ?? '' }}
                            </td>
                            <td>
                                {{ $contactEnquiry->email ?? '' }}
                            </td>
                            <td>
                                {{ $contactEnquiry->phone ?? '' }}
                            </td>
                            <td>
                                {{ $contactEnquiry->message ?? '' }}
                            </td>
                            <td>
                                {{ $contactEnquiry->degination ?? '' }}
                            </td>
                            <td>
                                @can('contact_enquiry_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.contact-enquiries.show', $contactEnquiry->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('contact_enquiry_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.contact-enquiries.edit', $contactEnquiry->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('contact_enquiry_delete')
                                    <form action="{{ route('admin.contact-enquiries.destroy', $contactEnquiry->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('contact_enquiry_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.contact-enquiries.massDestroy') }}",
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
  let table = $('.datatable-ContactEnquiry:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection