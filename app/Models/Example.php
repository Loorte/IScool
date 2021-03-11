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
      $xDisplay .= '...';
    }

    return $xDisplay;
  }

  public static function getExample($Operations, $Result, $Null) {
    $Oper = [
      '0' => '+',
      '1' => '-',
      '2' => '×',
      '3' => '÷',
    ];
    $Back = self::whereIn('operation', $Operations)
    ->where('result', '<=', $Result)
    ->where('param1', '<=', $Result)
    ->where('param2', '<=', $Result)
    ->where('param1', '>=', $Null)
    ->where('param2', '>=', $Null )
    ->inRandomOrder()
    ->first();

    try {
      return $Back->param1.$Oper[$Back->operation].$Back->param2;
    } catch (\Exception $e) {
      return 'error';
    }


  }
}
