<?php 

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoEmail;

class EmailBill implements ImageStorage {
    public function store($parameters){
        echo "Entra Excel";
    }
}
