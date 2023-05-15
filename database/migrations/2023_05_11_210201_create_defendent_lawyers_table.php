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
        Schema::create('defendent_lawyers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_id'); // تعريف حقل مفتاح خارجي
            $table->string('name');
            $table->string('phone',13);


            $table->timestamps();
            $table->foreign('case_id')->references('id')->on('cases'); // تعريف المفتاح الخارجي
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defendent_lawyers');
    }
};
