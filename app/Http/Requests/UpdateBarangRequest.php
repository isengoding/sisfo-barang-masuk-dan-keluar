<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBarangRequest extends FormRequest
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
            'nama_barang' => 'required',
            'kode' => 'required|unique:barangs,kode,' . $this->barang->id,
            'satuan_id' => 'required|exists:satuans,id',
            'stok' => 'required|numeric',
            'min_stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'gambar' => 'nullable',
            'keterangan' => 'nullable',
        ];
    }
}
