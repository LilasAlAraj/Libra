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
        Schema::create('plaintaiff_lawyers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // تعريف حقل مفتاح خارجي
            $table->unsignedBigInteger('case_id'); // تعريف حقل مفتاح خارجي


            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users'); // تعريف المفتاح الخارجي
            $table->foreign('case_id')->references('id')->on('cases'); // تعريف المفتاح الخارجي
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plaintaiff_lawyers');
    }
};
