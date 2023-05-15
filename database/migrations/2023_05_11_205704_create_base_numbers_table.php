<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('base_numbers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_id'); // تعريف حقل مفتاح خارجي


            $table->integer('number');
            $table->integer('year');

            $table->timestamps();
            $table->foreign('case_id')->references('id')->on('cases'); // تعريف المفتاح الخارجي
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_numbers');
    }
};
