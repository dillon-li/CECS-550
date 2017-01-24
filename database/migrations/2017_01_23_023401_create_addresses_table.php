<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('addresses', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('userID')->unsigned();
        $table->string('name', 100)->nullable();
        $table->string('street', 100)->nullable();
        $table->string('city', 30)->nullable();
        $table->string('state', 30)->nullable();
        $table->string('zipcode', 12)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
