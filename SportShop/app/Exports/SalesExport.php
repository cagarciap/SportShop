<?php

namespace App\Exports;

use App\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Id',
            'Date',
            'Total_To_Pay',
            'User',
            'Created_At',
            'Updated_At'
        ];
    }
    public function collection()
    {
         $datesQuery = session()->get("datesQuery");
         $startDate = $datesQuery[0];
         $endDate = $datesQuery[1];
         $sales = Sale::all()->where('date','>=',$startDate)->where('date','<=',$endDate);
         return $sales;   
    }
}