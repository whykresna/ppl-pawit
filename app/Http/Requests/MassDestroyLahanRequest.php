<?php

namespace App\Http\Requests;

use App\Lahan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLahanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('lahan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:lahans,id',
        ];
    }
}
