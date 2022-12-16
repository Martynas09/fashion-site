<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchased_service', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id');
            $table->string('email');
            $table->string('name');
            $table->string('phone_number');
            $table->enum('status',['užsakyta', 'vykdoma', 'užbaigta']);
            $table->date('created_at');
            $table->string('order_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchased_service');
    }
};
