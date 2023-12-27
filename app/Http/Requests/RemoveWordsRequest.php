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

    public function attributes()
{
    return [
        'url.*' => 'rss',
        'remove_words.*' => '単語',
    ];
}
}
