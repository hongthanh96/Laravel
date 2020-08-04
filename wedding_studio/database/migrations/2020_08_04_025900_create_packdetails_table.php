<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('price');
            $table->string('service1');
            $table->string('service2');
            $table->string('service3')->nullable();
            $table->string('service4')->nullable();
            $table->string('service5')->nullable();
            $table->string('packlist_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packdetails');
    }
}
