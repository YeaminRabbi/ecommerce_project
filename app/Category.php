<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model{
    use SoftDeletes;
    
    protected $fillable = [
        'categoryname','slug'
    ];

    function get_subcategory(){
        return $this->hasMany(Subcategory::class, 'category_id');
     }
  
     function product(){
           return $this->hasMany(Product::class, 'category_id');
     }
  
    //  function blog(){
    //     return $this->hasMany(Blog::class, 'category_id');
  
    //  }

}

