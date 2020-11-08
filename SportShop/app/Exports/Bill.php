<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Item;

class Bill implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $billId = session()->get("idBill");
        $items = Item::where('sale_id',$billId)->with("product")->get();
        $cart = session()->forget('products');
        return $items;
    }
}
