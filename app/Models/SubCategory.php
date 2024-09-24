<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($subCategory) {
            $subCategory->created_by = auth()->id();
            $subCategory->updated_by = auth()->id();
        });
        static::updating(function ($subCategory) {
            $subCategory->updated_by = auth()->id();
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
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
        return self::with('createdBy', 'updatedBy')->paginate(10);
    }

    public static function fetchById($id)
    {
        return self::with('createdBy', 'updatedBy')->findOrFail($id);
    }

    public static function storeSubCategory($data)
    {
        return self::create($data);
    }

    public static function updateSubCategory($data, $id)
    {
        return self::findOrFail($id)->update($data);
    }

    public static function deleteSubCategory($id)
    {
        return self::findOrFail($id)->delete();
    }


}
