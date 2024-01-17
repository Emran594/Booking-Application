<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('title');
            $table->unsignedBigInteger('from_location');
            $table->unsignedBigInteger('to_location');
            $table->unsignedBigInteger('bus_id');
            $table->string('fare');
            $table->string('status');
            $table->timestamps();

            $table->foreign('from_location')->references('id')->on('locations')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreign('to_location')->references('id')->on('locations')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreign('bus_id')->references('id')->on('buss')->restrictOnDelete()->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
