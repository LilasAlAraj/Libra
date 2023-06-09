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
        Schema::create('cases', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title');
            $table->string('Status', 50); //حالة القضية
            $table->integer('Value_Status'); // رقم الحالة من اجل المقارنة

            $table->text('facts')->nullable(); //الحقائق
            $table->text('claim')->nullable(); //الوقائع والالتماس

            $table->string('case_room');
            $table->unsignedBigInteger('court_id');
            $table->foreign('court_id')->references('id')->on('court')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases');
    }
};
