<?php

namespace App\Http\Requests;

use App\Tengkulak;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTengkulakRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tengkulak_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tengkulaks,id',
        ];
    }
}
