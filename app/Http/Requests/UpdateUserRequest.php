<?php

namespace App\Http\Requests;

use App\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use Propaganistas\LaravelPhone\PhoneNumber;


class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'         => [
                'required',
            ],
            'address'      => [
                'required',
            ],
            'phone_number' => [
                'min:11',
                'max:18',
                'phone:id',
                'required',
            ],
            'lahan_id'     => [
                'required',
                'integer',
            ],
            'email'        => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'roles.*'      => [
                'integer',
            ],
            'roles'        => [
                'required',
                'array',
            ],
        ];
    }
}
