<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('appointment_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->date('date');
            $table->string('time', 5)->default('00:00');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        //
    }
};
