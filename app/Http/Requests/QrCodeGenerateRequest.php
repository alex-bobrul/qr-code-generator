<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class QrCodeGenerateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "background_color" => ["required", "string", "max:255"],
            "fill_color" => ["required", "string", "max:255"],
            "content" => ["required", "string", "max:255"],
            "size" => ["required", "numeric", "min:1", "max:9999"]
        ];
    }
}
