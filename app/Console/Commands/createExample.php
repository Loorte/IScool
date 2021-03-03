<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class createExample extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:example';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $max = env('MAX_VALUE');
        $min = 0;
        for($i=0;$i<=env('COUNT_EXAMPLE');$i++) {
          $operation = rand(0, 3);
          $itemWhy = rand(0, 2);
          //0 = +
          //1 = -
          //2 = ×
          //3 = ÷
          $display = null;
          if($operation == 0) { //+
            $result = rand($min, $max);
            $param1 = rand($min, $result);
            $param2 = $result - $param1;
            $display = $itemWhy==0?'▢+':$param1.'+';
            $display .= $itemWhy==1?'▢=':$param2.'=';
            $display .= $itemWhy==2?'▢':$result;
          } elseif ($operation == 1) { //-
            $param1 = rand($min, $max);
            $param2 = rand($min, $param1);
            $result = $param1-$param2;
            $display = $itemWhy==0?'▢-':$param1.'-';
            $display .= $itemWhy==1?'▢=':$param2.'=';
            $display .= $itemWhy==2?'▢':$result;
          } elseif ($operation == 2) { //×
            $result = rand(1, $max);
            $param1 = rand(1, $result);
            while(($result % $param1) !=0) {
              $param1 = rand(1, $result);
            }
            $param2 = $result/$param1;
            $display = $itemWhy==0?'▢×':$param1.'×';
            $display .= $itemWhy==1?'▢=':$param2.'=';
            $display .= $itemWhy==2?'▢':$result;
          } elseif ($operation == 3) { //÷
            $param1 = rand(1, $max);
            $param2 = rand(1, $param1);
            while(($param1 % $param2) !=0) {
              $param2 = rand(1, $param1);
            }
            $result = $param1/$param2;
            $display = $itemWhy==0?'▢÷':$param1.'÷';
            $display .= $itemWhy==1?'▢=':$param2.'=';
            $display .= $itemWhy==2?'▢':$result;
          }


          if(is_null(\App\Models\Example::where('display', $display)->first()))
            \App\Models\Example::create([
                'operation' => $operation,
                'param1' => $param1,
                'param2' => $param2,
                'result' => $result,
                'itemWhy' => $itemWhy,
                'display' => $display
            ]);
            $this->info($display);
          }
    }
}
