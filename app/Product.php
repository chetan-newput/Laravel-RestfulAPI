<?php

namespace App;

use App\Category;
use App\Seller;
use App\Transaction;
use App\Transformers\ProductTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    const AVAILABEL_PRODUCT = "available";
    const UNAVAILABEL_PRODUCT = "unavailable";

    protected $fillable = [
      "name",
      "description",
      "quantity",
      "status",
      "image",
      "seller_id"
    ];
    protected $hidden = ['pivot'];
    public $transformer = ProductTransformer::class;

    public function isAvailable(){
      return $this->status == Product::AVAILABEL_PRODUCT;
    } 

    public function seller()
    {
      return $this->belongsTo(Seller::class);
    }

    public function transactions()
    {
      return $this->hasMany(Transaction::class);
    }

    public function categories()
    {
      return $this->belongsToMany(Category::class);
    }
}
