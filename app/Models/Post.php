<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'category_id'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeFilteredProducts($query,$catID){

       return $query->when((!is_null($catID) and $catID != ''),function ($q) use($catID){
            return $q->where('category_id',$catID);
        })->paginate(10);
    }
}
