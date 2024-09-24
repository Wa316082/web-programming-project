<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($product) {
            $product->created_by = auth()->id();
            $product->updated_by = auth()->id();
        });
        static::updating(function ($product) {
            $product->updated_by = auth()->id();
        });
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public static function fetchAll()
    {
        return self::with('createdBy', 'updatedBy', 'subCategory.category')->paginate(10);
    }

    public static function fetchById($id)
    {
        return self::with('createdBy', 'updatedBy')->findOrFail($id);
    }

    public static function storeProduct($data)
    {
        if(isset($data['image'])){
            $image_name = $data['image']->getClientOriginalName();
            $data['image']->move(public_path('images'), $image_name);
            $data['image'] = 'images/'.$image_name;
        }
        return self::create($data);
    }

    public static function updateProduct($data, $id)
    {
        if(isset($data['image'])){
            $image_name = $data['image']->getClientOriginalName();
            $data['image']->move(public_path('images'), $image_name);
            $data['image'] = 'images/'.$image_name;
        }
        return self::where('id', $id)->update($data);
    }

    public static function deleteProduct($id)
    {
        return self::destroy($id);
    }
}
