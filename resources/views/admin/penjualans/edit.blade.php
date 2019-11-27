@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.penjualan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.penjualans.update", [$penjualan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="tengkulak_id">{{ trans('cruds.penjualan.fields.tengkulak') }}</label>
                <select class="form-control select2 {{ $errors->has('tengkulak') ? 'is-invalid' : '' }}" name="tengkulak_id" id="tengkulak_id" required>
                    @foreach($tengkulaks as $id => $tengkulak)
                        <option value="{{ $id }}" {{ ($penjualan->tengkulak ? $penjualan->tengkulak->id : old('tengkulak_id')) == $id ? 'selected' : '' }}>{{ $tengkulak }}</option>
                    @endforeach
                </select>
                @if($errors->has('tengkulak_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tengkulak_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penjualan.fields.tengkulak_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tanggal_pengiriman">{{ trans('cruds.penjualan.fields.tanggal_pengiriman') }}</label>
                <input class="form-control {{ $errors->has('tanggal_pengiriman') ? 'is-invalid' : '' }}" type="text" name="tanggal_pengiriman" id="tanggal_pengiriman" value="{{ old('tanggal_pengiriman', $penjualan->tanggal_pengiriman) }}" required>
                @if($errors->has('tanggal_pengiriman'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal_pengiriman') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penjualan.fields.tanggal_pengiriman_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jumlah_permintaan">{{ trans('cruds.penjualan.fields.jumlah_permintaan') }}</label>
                <input class="form-control {{ $errors->has('jumlah_permintaan') ? 'is-invalid' : '' }}" type="number" name="jumlah_permintaan" id="jumlah_permintaan" value="{{ old('jumlah_permintaan', $penjualan->jumlah_permintaan) }}" step="1" required>
                @if($errors->has('jumlah_permintaan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jumlah_permintaan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penjualan.fields.jumlah_permintaan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="harga_penjualan">{{ trans('cruds.penjualan.fields.harga_penjualan') }}</label>
                <input class="form-control {{ $errors->has('harga_penjualan') ? 'is-invalid' : '' }}" type="number" name="harga_penjualan" id="harga_penjualan" value="{{ old('harga_penjualan', $penjualan->harga_penjualan) }}" step="1" required>
                @if($errors->has('harga_penjualan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('harga_penjualan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penjualan.fields.harga_penjualan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pajak_penjualan">{{ trans('cruds.penjualan.fields.pajak_penjualan') }}</label>
                <input class="form-control {{ $errors->has('pajak_penjualan') ? 'is-invalid' : '' }}" type="number" name="pajak_penjualan" id="pajak_penjualan" value="{{ old('pajak_penjualan', $penjualan->pajak_penjualan) }}" step="1" required>
                @if($errors->has('pajak_penjualan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pajak_penjualan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penjualan.fields.pajak_penjualan_helper') }}</span>
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

@section('scripts')
    @parent
    <script>
        $(document).ready(function () {
            $('#tanggal_pengiriman').datepicker({
                format: 'dd-mm-yyyy',
                startDate: new Date()
            });
        })
    </script>
@endsection
