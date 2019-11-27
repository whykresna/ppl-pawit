@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.penjualan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.penjualans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.penjualan.fields.id') }}
                        </th>
                        <td>
                            {{ $penjualan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penjualan.fields.tengkulak') }}
                        </th>
                        <td>
                            {{ $penjualan->tengkulak->nama_tengkulak ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penjualan.fields.tanggal_pengiriman') }}
                        </th>
                        <td>
                            {{ $penjualan->tanggal_pengiriman }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penjualan.fields.jumlah_permintaan') }}
                        </th>
                        <td>
                            {{ $penjualan->jumlah_permintaan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penjualan.fields.harga_penjualan') }}
                        </th>
                        <td>
                            {{ $penjualan->harga_penjualan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penjualan.fields.pajak_penjualan') }}
                        </th>
                        <td>
                            {{ $penjualan->pajak_penjualan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.penjualans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>


    </div>
</div>
@endsection