<?php

namespace App\Http\Requests\Purchase;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'item_name' => 'required|min:1|max:255',
            'item_maker' => 'required|min:1|max:255',
            'item_value' => 'required|min:1|max:10',
            'purchased_date' => 'required',
            'comment' => 'required|min:1|max:255',            
        ];
    }
}
