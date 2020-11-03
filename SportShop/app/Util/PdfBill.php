<?php 

namespace App\Util;

use App\Interfaces\BillWay;
use Illuminate\Support\Facades\Storage;
use App\Product;
use PDF;
class PdfBill implements BillWay {
    public function store($parameters){
        $idSale = $parameters[0][0];
        $date = $parameters[0][1];
        $total = $parameters[0][2];
        $userName = $parameters[0][3];
        $cart = session()->get("products");
        $data = [];
        $products_id = array_keys($cart);
        for ($i = 0; $i < count($products_id); $i++){
            $quantity = $cart[$products_id[$i]];
            $product = Product::find($products_id[$i]);
            $productName = $product->getName();
            $price = $product->getPrice();
            $item = [$productName, $price, $quantity, $quantity*$price];
            array_push($data,$item);
        }
        $prueba = '
        <!DOCTYPE html>
        <html>
          <head>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
          </head>
          <body>
        <h1>Factura de Venta Sport Shop</h1></br>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Id Sale: </td>
                        <td>'.$idSale.'</td>
                    </tr>
                    <tr>
                        <td>Sale Date: </td>
                        <td>'.$date.'</td>
                    </tr>
                    <tr>
                        <td>Total to pay: </td>
                        <td>'.$total.'</td>
                    </tr>
                    <tr>
                        <td>User Name: </td>
                        <td>'.$userName.'</td>
                    </tr>
                </tbody>
            </table>
            <h2>Products</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Product Name</td>
                        <td>Product Price</td>
                        <td>Product Quantity</td>
                        <td>Total to Pay</td>
                    </tr>
                </thead>
                <tbody>';
        foreach ($data as $item) { 
            $prueba = $prueba.'<tr>';
            foreach($item as $valor){
                $prueba = $prueba.'<td>'.$valor.'</td>';
            }
            $prueba = $prueba.'</tr>';
        } 
        $prueba = $prueba.'</body></html>';

        $pdf = PDF::loadHTML($prueba);
        $cart = session()->forget('products');
        $nameFile = "Sale".$idSale.$date.".pdf";
        return $pdf->download($nameFile);
    }
}
