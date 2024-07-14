<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class InventoriesExport implements FromArray, WithHeadings
{
    use Exportable;

    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'SN.', 
            'INV-ID', 
            'Crt.Date',
            'Mfg.Date',
            'Exp.Date', 
            'Group',
            'Medicine', 
            'Dosage', 
            'MRP',
            'Units', 
            'Qty', 
            'Amount',
            'VAT', 
            'Tax', 
            'Discount',
            'Sub Total', 
            'Status'
        ];
    }
}
