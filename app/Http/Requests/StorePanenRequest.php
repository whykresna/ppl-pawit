<?php

namespace App\Http\Requests;

use App\Panen;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePanenRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('panen_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'tanggal_panen' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'lahan_id'      => [
                'required',
                'integer',
            ],
            'jumlah_buah'   => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'bruto'         => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'tarra'         => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'gross'         => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'pot'           => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'netto'         => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
