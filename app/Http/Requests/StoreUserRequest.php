<?php

namespace App\Http\Requests;

use App\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'profile_image' => [
                'required',
            ],
            'name'          => [
                'required',
            ],
            'address'       => [
                'required',
            ],
            'phone_number'  => [
                'min:11',
                'max:18',
                'required',
            ],
            'lahan_id'      => [
                'required',
                'integer',
            ],
            'email'         => [
                'required',
                'unique:users',
            ],
            'password'      => [
                'required',
            ],
            'roles.*'       => [
                'integer',
            ],
            'roles'         => [
                'required',
                'array',
            ],
        ];
    }
}
