<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePemasokRequest extends FormRequest
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
            'nama_pemasok' => ['required'],
            'email' => ['required', 'email', 'unique:pemasoks,email,' . $this->pemasok->id],
            'notelp' => ['required'],
            'alamat' => ['nullable'],
        ];
    }
}
