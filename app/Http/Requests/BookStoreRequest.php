<?php

namespace App\Http\Requests;

use App\Models\Author;
use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            'year' => 'integer|min:1|max:'.(date('Y') + 1),
            'name' => 'required|string|between:3,30',
            'author_id' => 'required|exists:'.Author::class.',id',
        ];
    }
}
