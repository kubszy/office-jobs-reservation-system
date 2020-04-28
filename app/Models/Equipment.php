<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
  protected $table = 'equipments';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'workplace_id', 'type', 'model', 'mark', 'year_purchase', 'worth', 'description', 'status'
  ];

  public function workplace()
  {
    return $this->belongsTo('App\Models\Workplace');
  }
}
