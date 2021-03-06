<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Example extends Model {
  use HasFactory;

  protected $fillable = [
    'operation',
    'param1',
    'param2',
    'result',
    'itemWhy',
    'display'
  ];

  public static function getXDisplay($value) {
    $xDisplay = '';
    for($i=0;$i<=strlen($value)-1;$i++) {
      $xDisplay .= '▢';
    }

    return $xDisplay;
  }
}
