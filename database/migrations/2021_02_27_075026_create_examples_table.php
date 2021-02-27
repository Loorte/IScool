<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examples', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('operation')->nullable()->default(0);
            $table->integer('param1')->nullable()->default(0);
            $table->integer('param2')->nullable()->default(0);
            $table->integer('result')->nullable()->default(0);
            $table->integer('itemWhy')->nullable()->default(2);
            $table->text('display')->nullable()->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examples');
    }
}
