<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\SizeFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Size extends Model
{
  use HasFactory;
  protected $fillable = ["sizes"];
  protected static function newFactory(): Factory
  {
    return SizeFactory::new();
  }

  public function products(): BelongsTo
  {
    return $this->belongsTo(Product::class);
  }
}
