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
        $max = 100;
        for($i=0;$i<=2000000;$i++) {
          $operation = rand(0, 1);
          $itemWhy = rand(0, 2);
          //0 = +
          //1 = -
          $display = null;
          if($operation == 0) {
            $result = rand(0, $max);
            $param1 = rand(0, $result);
            $param2 = $result - $param1;
            $display = $itemWhy==0?'▢+':$param1.'+';
            $display .= $itemWhy==1?'▢=':$param2.'=';
            $display .= $itemWhy==2?'▢':$result;
          } elseif ($operation == 1) {
            $param1 = rand(0, $max);
            $param2 = rand(0, $param1);
            $result = $param1-$param2;
            $display = $itemWhy==0?'▢-':$param1.'-';
            $display .= $itemWhy==1?'▢=':$param2.'=';
            $display .= $itemWhy==2?'▢':$result;
          }

          try {
            \App\Models\Example::create([
              'operation' => $operation,
              'param1' => $param1,
              'param2' => $param2,
              'result' => $result,
              'itemWhy' => $itemWhy,
              'display' => $display
            ]);
            $this->info($display);
          } catch (\Exception $e) {
            $this->error("Пропуск ");
          }



        }
    }
}
