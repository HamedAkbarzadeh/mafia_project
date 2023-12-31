<?php

namespace App\Models\Market;

use App\Models\Content\PostCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryAttribute extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['name' , 'unit' , 'category_id' , 'type'];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
    public function values()
    {
        return $this->hasMany(CategoryValue::class);
    } 
}
