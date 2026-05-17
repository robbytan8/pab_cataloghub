<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @author Robby Tan
 */
class Role extends Model
{
  /** @use HasFactory<\Database\Factories\RoleFactory> */
  use HasFactory;

  protected $table = 'role';

  protected $fillable = [
    'name',
  ];
}
