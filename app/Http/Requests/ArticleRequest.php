<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'text' => ['required'],
            'source' => ['required'],
            'url' => ['required', 'url'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
