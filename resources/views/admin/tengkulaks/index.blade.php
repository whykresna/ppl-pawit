@extends('layouts.admin')
@section('content')
@can('tengkulak_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.tengkulaks.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.tengkulak.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tengkulak.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Tengkulak">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tengkulak.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tengkulak.fields.tanggal_masuk') }}
                        </th>
                        <th>
                            {{ trans('cruds.tengkulak.fields.nama_tengkulak') }}
                        </th>
                        <th>
                            {{ trans('cruds.tengkulak.fields.alamat_tengkulak') }}
                        </th>
                        <th>
                            {{ trans('cruds.tengkulak.fields.nomor_telepon_tengkulak') }}
                        </th>
                        <th>
                            {{ trans('cruds.tengkulak.fields.email_tengkulak') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tengkulaks as $key => $tengkulak)
                        <tr data-entry-id="{{ $tengkulak->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tengkulak->id ?? '' }}
                            </td>
                            <td>
                                {{ $tengkulak->tanggal_masuk ?? '' }}
                            </td>
                            <td>
                                {{ $tengkulak->nama_tengkulak ?? '' }}
                            </td>
                            <td>
                                {{ $tengkulak->alamat_tengkulak ?? '' }}
                            </td>
                            <td>
                                {{ $tengkulak->nomor_telepon_tengkulak ?? '' }}
                            </td>
                            <td>
                                {{ $tengkulak->email_tengkulak ?? '' }}
                            </td>
                            <td>

                                @can('tengkulak_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tengkulaks.edit', $tengkulak->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tengkulak_delete')
                                    <form action="{{ route('admin.tengkulaks.destroy', $tengkulak->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tengkulak_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tengkulaks.massDestroy') }}",
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
    order: [[ 1, 'asc' ]],
    pageLength: 25,
  });
  $('.datatable-Tengkulak:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection