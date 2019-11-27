<?php

namespace App\Http\Requests;

use App\Lahan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateLahanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('lahan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nama_lahan'   => [
                'required',
                'unique:lahans,nama_lahan,' . request()->route('lahan')->id,
            ],
            'luas_lahan'   => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'jumlah_bibit' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
