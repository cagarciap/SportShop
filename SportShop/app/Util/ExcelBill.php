<?php 

namespace App\Util;

use App\Interfaces\BillWay;
use Illuminate\Support\Facades\Storage;
use App\Exports\Bill;
use Maatwebsite\Excel\Facades\Excel;

class ExcelBill implements BillWay {
    public function store($parameters){
        return Excel::download(new Bill, 'bill.xlsx');
    }
}
