<?php

namespace App\Exports;

use App\Models\Promo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PromoExport implements FromCollection, WithHeadings, WithMapping
{
    private $key = 0;

    /**
     * Ambil data promo dari database
     */
    public function collection()
    {
        return Promo::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Judul kolom di Excel
     */
    public function headings(): array
    {
        return ['No', 'Kode Promo', 'Total Potongan'];
    }

    /**
     * Format isi data per baris
     */
    public function map($promo): array
    {
 
        if ($promo->type == 'percent') {
            $potongan = $promo->discount . '%';
        } else {

            $potongan = 'Rp. ' . number_format((int)$promo->discount, 0, ',', '.');
        }

        return [
            ++$this->key,
            $promo->promo_code,
            $potongan,
        ];
    }
}
