@extends('layouts.admin')
@section('content')
@can('lahan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.lahans.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.lahan.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.lahan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Lahan">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.lahan.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.lahan.fields.nama_lahan') }}
                        </th>
                        <th>
                            {{ trans('cruds.lahan.fields.luas_lahan') }}
                        </th>
                        <th>
                            {{ trans('cruds.lahan.fields.jumlah_bibit') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lahans as $key => $lahan)
                        <tr data-entry-id="{{ $lahan->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $lahan->id ?? '' }}
                            </td>
                            <td>
                                {{ $lahan->nama_lahan ?? '' }}
                            </td>
                            <td>
                                {{ $lahan->luas_lahan ?? '' }}
                            </td>
                            <td>
                                {{ $lahan->jumlah_bibit ?? '' }}
                            </td>
                            <td>

                                @can('lahan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.lahans.edit', $lahan->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('lahan_delete')
                                    <form action="{{ route('admin.lahans.destroy', $lahan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('lahan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.lahans.massDestroy') }}",
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
  $('.datatable-Lahan:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection