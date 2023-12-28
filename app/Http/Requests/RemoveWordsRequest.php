<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RemoveWordsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'url.*' => 'required|url',
            'remove_words.*' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'url.*.required' => 'RSSの入力は必須です',
            'url.*.url' => '有効なURLを入力してください',
        ];
    }
}
