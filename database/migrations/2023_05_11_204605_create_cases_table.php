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
            $table->id();
            $table->string('title');
            $table->string('room');
            $table->unsignedBigInteger('court_id'); // تعريف حقل مفتاح خارجي
            $table->text('claim'); // ادعاء
            $table->text('fact'); // وقائع
            $table->boolean('isArchived'); // الأرشفة
            $table->string('state');//الحالة

            $table->timestamps();
            $table->foreign('court_id')->references('id')->on('courts'); // تعريف المفتاح الخارجي

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
