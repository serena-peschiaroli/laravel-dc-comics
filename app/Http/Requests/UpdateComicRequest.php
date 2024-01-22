<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComicRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'required',
            'thumb' => 'required|url',
            'price' => 'required|numeric',
            'series' => 'required|max:255',
            'sale_date' => 'required|date',
            'type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title field is required!',
            'description.required' => 'please provide a descrpiption',
            'thumb.url' => 'The thumb must be an url',
            'price.numeric' => 'Please insert a numeric value',
            'series.required' => 'Required field',
            'sale_date.date' => 'Insert a valid date',
            'type.required' => 'This field is required',
        ];
    }
}
