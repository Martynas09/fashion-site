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
        Schema::create('group_member', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->enum('gender', ['vyras', 'moteris', 'nepateikta']);
            $table->integer('age');
            $table->string('name');
            $table->string('surname');
            $table->string('phone_number');
            $table->foreignId('group_id')->nullable()->constrained('group');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_member');
    }
};
