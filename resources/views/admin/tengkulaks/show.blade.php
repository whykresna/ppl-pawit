@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tengkulak.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tengkulaks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tengkulak.fields.id') }}
                        </th>
                        <td>
                            {{ $tengkulak->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tengkulak.fields.tanggal_masuk') }}
                        </th>
                        <td>
                            {{ $tengkulak->tanggal_masuk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tengkulak.fields.nama_tengkulak') }}
                        </th>
                        <td>
                            {{ $tengkulak->nama_tengkulak }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tengkulak.fields.alamat_tengkulak') }}
                        </th>
                        <td>
                            {{ $tengkulak->alamat_tengkulak }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tengkulak.fields.nomor_telepon_tengkulak') }}
                        </th>
                        <td>
                            {{ $tengkulak->nomor_telepon_tengkulak }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tengkulak.fields.email_tengkulak') }}
                        </th>
                        <td>
                            {{ $tengkulak->email_tengkulak }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tengkulaks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>


    </div>
</div>
@endsection