<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ["name"];

  use HasFactory;
  protected static function newFactory(): Factory
  {
    return ProductFactory::new();
  }

  public function categories(): BelongsTo
  {
    return $this->belongsTo(Categories::class);
  }

  public function sizes(): HasMany
  {
    return $this->hasMany(Size::class);
  }
}
