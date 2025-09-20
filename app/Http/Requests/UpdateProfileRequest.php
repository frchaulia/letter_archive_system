<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'telp' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'photo' => 'image|max:10000',
            'linkedin_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi',
            'name.string' => 'Nama harus berupa string',
            'name.max' => 'Nama harus kurang dari 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus berupa email yang valid',
            'email.unique' => 'Email sudah digunakan',
            'photo.image' => 'Foto harus berupa gambar',
            'photo.mimes' => 'Foto harus berupa file dengan tipe: jpeg, png, jpg',
            'photo.max' => 'Foto harus kurang dari 10MB',
        ];
    }
}
