<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColoromatStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "sample_id" => "required|unique:coloromats",
            "user_id" => "required",
            "icumsa" => "required",
        ];
    }
}
