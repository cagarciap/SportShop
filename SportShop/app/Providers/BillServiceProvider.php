<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\BillWay;
use App\Util\ExcelBill;
use App\Util\PdfBill;

class BillServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BillWay::class, function ($app, $parameters){
            $bill = $parameters["arrayBill"];
            if ($bill == "excel"){
                return new ExcelBill($parameters);
            }else{
                return new PdfBill($parameters);
            }
        });
    }
}
