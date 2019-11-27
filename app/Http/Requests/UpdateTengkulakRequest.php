<?php

namespace App\Http\Requests;

use App\Tengkulak;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use Propaganistas\LaravelPhone\PhoneNumber;


class UpdateTengkulakRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tengkulak_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'tanggal_masuk'           => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'nama_tengkulak'          => [
                'required',
            ],
            'alamat_tengkulak'        => [
                'required',
            ],
            'nomor_telepon_tengkulak' => [
                'min:11',
                'max:18',
                'phone:id',
                'required',
            ],
            'email_tengkulak'         => [
                'required',
            ],
        ];
    }
}
