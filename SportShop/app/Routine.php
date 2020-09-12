<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Routine extends Model
{
    //attributes id, name, price, created_at, updated_at
    protected $fillable = ['name','description','minMasa','maxMasa'];

    public static function validate(Request $request)
    {
      $request->validate([
        "name" => "required",
        "description" => "required" ,
        "minMasa" => "required|numeric|gt:0",
        "maxMasa" => "required|numeric|gte:minMasa",
      ]);
    }

    public static function validateBMI(Request $request)
    {
      $request->validate([
        "weight" => "required|numeric|gt:0",
        "height" => "required|numeric|gt:0",
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

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function getMinMasa()
    {
        return $this->attributes['minMasa'];
    }

    public function setMinMasa($minMasa)
    {
        $this->attributes['minMasa'] = $minMasa;
    }
    public function getMaxMasa()
    {
        return $this->attributes['maxMasa'];
    }

    public function setMaxMasa($maxMasa)
    {
        $this->attributes['maxMasa'] = $maxMasa;
    }

}
