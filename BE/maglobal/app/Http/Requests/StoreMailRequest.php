<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreMailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('mail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'driver'       => [
                'required',
            ],
            'host'       => [
                'required',
            ],
            'port'=>[
                'required'
            ],
            'username' => [
                'required',
            ],
            'password' => [
                'required',
            ],
            'encryption' => [
                'required',
            ],
        ];
    }
}
