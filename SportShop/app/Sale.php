<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Item;

class Sale extends Model
{
    //attributes id, date, total to pay, user_id
    protected $fillable = ['date','total_to_pay'];

    public static function validate(Request $request){
        $request->validate([
            "date" => "required|date",
            "total_to_pay" => "required|numeric|gt:0",
            "user" => "required"

        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getDate()
    {
        return $this->attributes['date'];
    }

    public function setDate($date)
    {
        $this->attributes['date'] = $date;
    }

    public function getTotal_to_pay()
    {
        return $this->attributes['total_to_pay'];
    }

    public function setTotal_to_pay($total_to_pay)
    {
        $this->attributes['total_to_pay'] = $total_to_pay;
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($user_id)
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
