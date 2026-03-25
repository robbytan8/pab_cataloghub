<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @author Robby Tan
 */
class Book extends Model
{
  /** @use HasFactory<\Database\Factories\BookFactory> */
  use HasFactory;

  protected $table = 'book';

  protected $fillable = [
    'isbn',
    'title',
    'author',
    'description',
    'publish_year',
    'cover',
    'category_id',
  ];

  protected $primaryKey = 'isbn';

  protected $keyType = 'string';

  public $incrementing = false;

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}
