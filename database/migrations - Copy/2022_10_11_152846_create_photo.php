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
        Schema::create('photo', function (Blueprint $table) {
            $table->id();
            $table->string('photo_url');
            $table->foreignId('post_id')->nullable()->references('id')->on('post')->onDelete('cascade');
            $table->foreignId('service_id')->nullable()->references('id')->on('service')->onDelete('cascade');
            $table->foreignId('group_activity_id')->nullable()->references('id')->on('group_activity')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo');
    }
};
