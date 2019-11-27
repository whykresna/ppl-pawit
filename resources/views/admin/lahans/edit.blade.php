@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.lahan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.lahans.update", [$lahan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nama_lahan">{{ trans('cruds.lahan.fields.nama_lahan') }}</label>
                <input class="form-control {{ $errors->has('nama_lahan') ? 'is-invalid' : '' }}" type="text" name="nama_lahan" id="nama_lahan" value="{{ old('nama_lahan', $lahan->nama_lahan) }}" required>
                @if($errors->has('nama_lahan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_lahan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lahan.fields.nama_lahan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="luas_lahan">{{ trans('cruds.lahan.fields.luas_lahan') }}</label>
                <input class="form-control {{ $errors->has('luas_lahan') ? 'is-invalid' : '' }}" type="number" name="luas_lahan" id="luas_lahan" value="{{ old('luas_lahan', $lahan->luas_lahan) }}" step="1" required>
                @if($errors->has('luas_lahan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('luas_lahan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lahan.fields.luas_lahan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jumlah_bibit">{{ trans('cruds.lahan.fields.jumlah_bibit') }}</label>
                <input class="form-control {{ $errors->has('jumlah_bibit') ? 'is-invalid' : '' }}" type="number" name="jumlah_bibit" id="jumlah_bibit" value="{{ old('jumlah_bibit', $lahan->jumlah_bibit) }}" step="1" required>
                @if($errors->has('jumlah_bibit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jumlah_bibit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lahan.fields.jumlah_bibit_helper') }}</span>
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