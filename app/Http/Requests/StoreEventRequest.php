<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:60',
            'featured' => 'required|string|max:60',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i:s',
            'location' => 'required|string|max:60',
        ];
    }
}
