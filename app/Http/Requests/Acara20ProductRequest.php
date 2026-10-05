<?php

namespace App\Http\Requests;

use App\Rules\Acara20Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class Acara20ProductRequest extends FormRequest
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
            'name'        => 'required|min:3|max:50',
            'sku'         => ['required', 'min:3', new Acara20Uppercase], // Validasi dengan Custom Rule Uppercase
            'category_id' => 'required|numeric',
            'price'       => 'required|numeric|min:1000',
            'stock'       => 'required|numeric|min:0',
        ];
    }

    /**
     * Pesan validasi kustom (Custom Validation Messages)
     */
    public function messages(): array
    {
        return [
            'name.required'        => 'Nama produk wajib diisi!',
            'name.min'             => 'Nama produk minimal 3 karakter!',
            'sku.required'         => 'Kode SKU wajib diisi!',
            'category_id.required' => 'Pilih kategori produk!',
            'price.required'       => 'Harga produk tidak boleh kosong!',
            'price.min'            => 'Harga produk minimal Rp 1.000!',
            'stock.required'       => 'Jumlah stok wajib diisi!',
        ];
    }
}
