@extends('layouts.admin')
@section('content')
@can('panen_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.panens.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.panen.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Panen', 'route' => 'admin.panens.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.panen.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Panen">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.panen.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.panen.fields.tanggal_panen') }}
                        </th>
                        <th>
                            {{ trans('cruds.panen.fields.lahan') }}
                        </th>
                        <th>
                            {{ trans('cruds.panen.fields.jumlah_buah') }}
                        </th>
                        <th>
                            {{ trans('cruds.panen.fields.bruto') }}
                        </th>
                        <th>
                            {{ trans('cruds.panen.fields.tarra') }}
                        </th>
                        <th>
                            {{ trans('cruds.panen.fields.gross') }}
                        </th>
                        <th>
                            {{ trans('cruds.panen.fields.pot') }}
                        </th>
                        <th>
                            {{ trans('cruds.panen.fields.netto') }}
                        </th>
                        <th>
                            {{ trans('cruds.panen.fields.keterangan') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($panens as $key => $panen)
                        <tr data-entry-id="{{ $panen->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $panen->id ?? '' }}
                            </td>
                            <td>
                                {{ $panen->tanggal_panen ?? '' }}
                            </td>
                            <td>
                                {{ $panen->lahan->nama_lahan ?? '' }}
                            </td>
                            <td>
                                {{ $panen->jumlah_buah ?? '' }}
                            </td>
                            <td>
                                {{ $panen->bruto ?? '' }}
                            </td>
                            <td>
                                {{ $panen->tarra ?? '' }}
                            </td>
                            <td>
                                {{ $panen->gross ?? '' }}
                            </td>
                            <td>
                                {{ $panen->pot ?? '' }}
                            </td>
                            <td>
                                {{ $panen->netto ?? '' }}
                            </td>
                            <td>
                                {{ $panen->keterangan ?? '' }}
                            </td>
                            <td>

                                @can('panen_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.panens.edit', $panen->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('panen_delete')
                                    <form action="{{ route('admin.panens.destroy', $panen->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('panen_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.panens.massDestroy') }}",
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
  $('.datatable-Panen:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection