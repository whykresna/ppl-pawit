@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.panen.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.panens.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="tanggal_panen">{{ trans('cruds.panen.fields.tanggal_panen') }}</label>
                <input class="form-control date {{ $errors->has('tanggal_panen') ? 'is-invalid' : '' }}" type="text" name="tanggal_panen" id="tanggal_panen" value="{{ old('tanggal_panen') }}" required>
                @if($errors->has('tanggal_panen'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal_panen') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.panen.fields.tanggal_panen_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lahan_id">{{ trans('cruds.panen.fields.lahan') }}</label>
                <select class="form-control select2 {{ $errors->has('lahan') ? 'is-invalid' : '' }}" name="lahan_id" id="lahan_id" required>
                    @foreach($lahans as $id => $lahan)
                        <option value="{{ $id }}" {{ old('lahan_id') == $id ? 'selected' : '' }}>{{ $lahan }}</option>
                    @endforeach
                </select>
                @if($errors->has('lahan_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lahan_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.panen.fields.lahan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jumlah_buah">{{ trans('cruds.panen.fields.jumlah_buah') }}</label>
                <input class="form-control {{ $errors->has('jumlah_buah') ? 'is-invalid' : '' }}" type="number" name="jumlah_buah" id="jumlah_buah" value="{{ old('jumlah_buah') }}" step="1" required>
                @if($errors->has('jumlah_buah'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jumlah_buah') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.panen.fields.jumlah_buah_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="bruto">{{ trans('cruds.panen.fields.bruto') }}</label>
                <input class="form-control {{ $errors->has('bruto') ? 'is-invalid' : '' }}" type="number" name="bruto" id="bruto" value="{{ old('bruto') }}" step="1" required>
                @if($errors->has('bruto'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bruto') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.panen.fields.bruto_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tarra">{{ trans('cruds.panen.fields.tarra') }}</label>
                <input class="form-control {{ $errors->has('tarra') ? 'is-invalid' : '' }}" type="number" name="tarra" id="tarra" value="{{ old('tarra') }}" step="1" required>
                @if($errors->has('tarra'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tarra') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.panen.fields.tarra_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="gross">{{ trans('cruds.panen.fields.gross') }}</label>
                <input class="form-control {{ $errors->has('gross') ? 'is-invalid' : '' }}" type="number" name="gross" id="gross" value="{{ old('gross') }}" step="1" required>
                @if($errors->has('gross'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gross') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.panen.fields.gross_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pot">{{ trans('cruds.panen.fields.pot') }}</label>
                <input class="form-control {{ $errors->has('pot') ? 'is-invalid' : '' }}" type="number" name="pot" id="pot" value="{{ old('pot') }}" step="1" required>
                @if($errors->has('pot'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pot') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.panen.fields.pot_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="netto">{{ trans('cruds.panen.fields.netto') }}</label>
                <input class="form-control {{ $errors->has('netto') ? 'is-invalid' : '' }}" type="number" name="netto" id="netto" value="{{ old('netto') }}" step="1" required>
                @if($errors->has('netto'))
                    <div class="invalid-feedback">
                        {{ $errors->first('netto') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.panen.fields.netto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan">{{ trans('cruds.panen.fields.keterangan') }}</label>
                <input class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" type="text" name="keterangan" id="keterangan" value="{{ old('keterangan', '') }}">
                @if($errors->has('keterangan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('keterangan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.panen.fields.keterangan_helper') }}</span>
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