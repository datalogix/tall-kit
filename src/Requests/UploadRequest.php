<?php

namespace TALLKit\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return config('tallkit.options.upload.enabled');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file' => ['sometimes', 'file'],
            'disk' => ['nullable', 'string'],
            'folder' => ['nullable', 'string'],
        ];
    }
}
