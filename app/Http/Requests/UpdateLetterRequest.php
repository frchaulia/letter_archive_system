<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLetterRequest extends FormRequest
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
            'number' => 'required|string|max:50',
            'date' => 'required|date',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:letter_categories,id',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul surat wajib diisi.',
            'title.string' => 'Judul surat harus berupa teks.',
            'title.max' => 'Judul surat tidak boleh lebih dari 255 karakter.',
            'number.required' => 'Nomor surat wajib diisi.',
            'number.string' => 'Nomor surat harus berupa teks.',
            'number.max' => 'Nomor surat tidak boleh lebih dari 50 karakter.',
            'date.required' => 'Tanggal surat wajib diisi.',
            'date.date' => 'Tanggal surat harus berupa tanggal yang valid.',
            'description.string' => 'Deskripsi surat harus berupa teks.',
            'category_id.required' => 'Kategori surat wajib dipilih.',
            'category_id.exists' => 'Kategori surat yang dipilih tidak valid.',
            'file_path.file' => 'File harus berupa file yang valid.',
            'file_path.mimes' => 'File harus berformat pdf, doc, atau docx.',
            'file_path.max' => 'Ukuran file tidak boleh lebih dari 2MB.',
        ];
    }
}
