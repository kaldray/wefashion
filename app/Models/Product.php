<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  /**Allow mass assignment */
  protected $fillable = [
    "name",
    "description",
    "price",
    "image",
    "published",
    "state",
    "reference",
    "categories_id",
    "sizes",
  ];

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

  /**Shorthand to get the right path for the image */
  public function imageUrl(): string
  {
    return Storage::disk("public")->url($this->image);
  }
}
