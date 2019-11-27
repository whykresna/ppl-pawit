<?php

namespace App\Http\Requests;

use App\Penjualan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePenjualanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('penjualan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'tengkulak_id'       => [
                'required',
                'integer',
            ],
            'tanggal_pengiriman' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'jumlah_permintaan'  => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'harga_penjualan'    => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'pajak_penjualan'    => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
