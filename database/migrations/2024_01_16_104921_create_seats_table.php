<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('bus_id');
            $table->foreign('bus_id')->references('id')->on('buss');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
