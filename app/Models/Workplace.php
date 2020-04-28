<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workplace extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'mark', 'description', 'status',
  ];  

  public function equipments()
  {
    return $this->hasMany('App\Models\Equipment');
  }
}
