<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categories extends Model
{
  use HasFactory;
  protected $fillable = ["name"];
  protected static function newFactory(): Factory
  {
    return CategoryFactory::new();
  }

  public function products(): HasMany
  {
    return $this->hasMany(Product::class);
  }
}
