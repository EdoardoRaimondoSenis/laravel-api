<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'argument' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'collaborators' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ];

    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.string' => 'Il titolo deve essere una stringa',
            'title.max' => 'Il titolo non può superare i 255 caratteri',
            'argument.required' => 'L\'argomento è obbligatorio',
            'argument.string' => 'L\'argomento deve essere una stringa',
            'start_date.required' => 'La data di inizio è obbligatoria',
            'start_date.date' => 'La data di inizio deve essere una data',
            'end_date.required' => 'La data di fine è obbligatoria',
            'end_date.date' => 'La data di fine deve essere una data',
            'end_date.after_or_equal' => 'La data di fine deve essere successiva o uguale alla data di inizio',
            'collaborators.string' => 'I collaboratori devono essere una stringa',
            'image.image' => 'Il file caricato deve essere un\'immagine',
            'image.mimes' => 'Il file caricato deve essere un\'immagine di tipo jpeg, png, jpg, gif o svg',
            'image.max' => 'Il file caricato non può superare i 5MB',
        ];
    }
}
