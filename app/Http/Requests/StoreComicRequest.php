<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
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
            'title.required' => 'Il campo "titolo" è richiesto',
            'description.required' => 'Inserisci una descrizione',
            'thumb.url' => 'Il campo "immagine" deve contenere un URL valido',
            'price.numeric' => 'Per favore, inserisci un valore numerico',
            'series.required' => 'Il campo "series" è richiesto',
            'sale_date.date' => 'Inserisci una data valida',
            'type.required' => 'Questo campo è richiesto',

        ];
    }
}
