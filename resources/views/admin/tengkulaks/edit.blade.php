@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tengkulak.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tengkulaks.update", [$tengkulak->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="tanggal_masuk">{{ trans('cruds.tengkulak.fields.tanggal_masuk') }}</label>
                <input class="form-control datetime {{ $errors->has('tanggal_masuk') ? 'is-invalid' : '' }}" type="text" name="tanggal_masuk" id="tanggal_masuk" value="{{ old('tanggal_masuk', $tengkulak->tanggal_masuk) }}" required>
                @if($errors->has('tanggal_masuk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal_masuk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tengkulak.fields.tanggal_masuk_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama_tengkulak">{{ trans('cruds.tengkulak.fields.nama_tengkulak') }}</label>
                <input class="form-control {{ $errors->has('nama_tengkulak') ? 'is-invalid' : '' }}" type="text" name="nama_tengkulak" id="nama_tengkulak" value="{{ old('nama_tengkulak', $tengkulak->nama_tengkulak) }}" required>
                @if($errors->has('nama_tengkulak'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_tengkulak') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tengkulak.fields.nama_tengkulak_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="alamat_tengkulak">{{ trans('cruds.tengkulak.fields.alamat_tengkulak') }}</label>
                <textarea class="form-control {{ $errors->has('alamat_tengkulak') ? 'is-invalid' : '' }}" name="alamat_tengkulak" id="alamat_tengkulak" required>{{ old('alamat_tengkulak', $tengkulak->alamat_tengkulak) }}</textarea>
                @if($errors->has('alamat_tengkulak'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alamat_tengkulak') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tengkulak.fields.alamat_tengkulak_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nomor_telepon_tengkulak">{{ trans('cruds.tengkulak.fields.nomor_telepon_tengkulak') }}</label>
                <input class="form-control {{ $errors->has('nomor_telepon_tengkulak') ? 'is-invalid' : '' }}" type="text" name="nomor_telepon_tengkulak" id="nomor_telepon_tengkulak" value="{{ old('nomor_telepon_tengkulak', $tengkulak->nomor_telepon_tengkulak) }}" required>
                @if($errors->has('nomor_telepon_tengkulak'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nomor_telepon_tengkulak') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tengkulak.fields.nomor_telepon_tengkulak_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email_tengkulak">{{ trans('cruds.tengkulak.fields.email_tengkulak') }}</label>
                <input class="form-control {{ $errors->has('email_tengkulak') ? 'is-invalid' : '' }}" type="text" name="email_tengkulak" id="email_tengkulak" value="{{ old('email_tengkulak', $tengkulak->email_tengkulak) }}" required>
                @if($errors->has('email_tengkulak'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email_tengkulak') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tengkulak.fields.email_tengkulak_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>


    </div>
</div>
@endsection