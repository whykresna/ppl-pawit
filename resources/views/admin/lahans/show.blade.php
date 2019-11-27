@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.lahan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.lahans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.lahan.fields.id') }}
                        </th>
                        <td>
                            {{ $lahan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lahan.fields.nama_lahan') }}
                        </th>
                        <td>
                            {{ $lahan->nama_lahan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lahan.fields.luas_lahan') }}
                        </th>
                        <td>
                            {{ $lahan->luas_lahan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lahan.fields.jumlah_bibit') }}
                        </th>
                        <td>
                            {{ $lahan->jumlah_bibit }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.lahans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>


    </div>
</div>
@endsection