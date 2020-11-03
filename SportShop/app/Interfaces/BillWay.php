<?php 

namespace App\Interfaces;
use Illuminate\Http\Request;

interface BillWay {
    public function store($parameters);
}