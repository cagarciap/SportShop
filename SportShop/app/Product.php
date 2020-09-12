<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Category;
use App\Item;

class Product extends Model
{
    protected $fillable = ['name','description','quantity','price', 'size', 'image', 'category_id'];
    //protected $fillable = ['name','description','quantity','price', 'size', 'image'];

    public static function validate(Request $request){
        $request->validate([
            "name" => "required",
            "description" => "required",
            "quantity" => "required|numeric",
            "price" => "required|numeric|gt:0",
            "size" => "",
            "category" => "required"
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
        return $this->attributes['description'] = $description;
    }

    public function getQuantity()
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($quantity)
    {
        return $this->attributes['quantity'] = $quantity;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getSize()
    {
        return $this->attributes['size'];
    }

    public function setSize($size)
    {
        $this->attributes['size'] = $size;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public function getCategoryId()
    {
        return $this->attributes['category_id'];
    }

    public function setCategoryId($category_id)
    {
        $this->attributes['category_id'] = $category_id;
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function items(){
        return $this->hasMany(Item::class);
    }
}
