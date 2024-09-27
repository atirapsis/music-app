<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MusicRequest extends FormRequest
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
            'title' => 'required|min:5',
            'artist' => 'required|min:5',
            'genre_id' => 'required',
            'release_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg, png, jpg, gif|max:2048',
        ];
    }

    public function messages(){
        return [

            //For title
            'title.required' => 'The title field is required',
            'title.min' => 'The title must be at least 5 characters long.',

            //For artist
            'artist.required' => 'The artist field is required',
            'artist.min:5' => 'The title must be at least 5 characters long.',

            'genre_id.required' => 'Please select a genre',

            //for date
            'release_date.required' => 'The release date field is required.',
            'release_date.date' => 'The release date must be a valid date.',

            //for image
            'image.image' => 'The file must be an image',
            'image.mimes' => 'The image must be a file of type : jpeg, png, jpg, gif.',
            'image.max' => 'The image must not be greater than 2048 kilobytes.',
        ];
    }
}
