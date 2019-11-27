<?php

namespace App\Http\Requests;

use App\Panen;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPanenRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('panen_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:panens,id',
        ];
    }
}
