<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($category) {
            $category->created_by = auth()->id();
            $category->updated_by = auth()->id();
        });
        static::updating(function ($category) {
            $category->updated_by = auth()->id();
        });
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, SubCategory::class);
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

    public static function storeCategory($data)
    {
        return self::create($data);
    }

   public static function updateCategory($data, $id)
    {
        return self::findOrFail($id)->update($data);
    }

    public static function deleteCategory($id)
    {
        return self::findOrFail($id)->delete();
    }
}
