<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return \App\Models\Product::all();
    }

    public function headings(): array

    {

        return [

            'ID',
            'PRODUCT ID NUMBER',
            'BOTANICAL NAME',
            'COMMON NAME',
            'COMMON NAME',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description',
            'Description'

        ];

    }
}
