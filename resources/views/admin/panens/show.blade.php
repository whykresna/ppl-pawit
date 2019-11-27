@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.panen.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.panens.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.panen.fields.id') }}
                        </th>
                        <td>
                            {{ $panen->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.panen.fields.tanggal_panen') }}
                        </th>
                        <td>
                            {{ $panen->tanggal_panen }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.panen.fields.lahan') }}
                        </th>
                        <td>
                            {{ $panen->lahan->nama_lahan ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.panen.fields.jumlah_buah') }}
                        </th>
                        <td>
                            {{ $panen->jumlah_buah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.panen.fields.bruto') }}
                        </th>
                        <td>
                            {{ $panen->bruto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.panen.fields.tarra') }}
                        </th>
                        <td>
                            {{ $panen->tarra }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.panen.fields.gross') }}
                        </th>
                        <td>
                            {{ $panen->gross }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.panen.fields.pot') }}
                        </th>
                        <td>
                            {{ $panen->pot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.panen.fields.netto') }}
                        </th>
                        <td>
                            {{ $panen->netto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.panen.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $panen->keterangan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.panens.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>


    </div>
</div>
@endsection