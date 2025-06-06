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
        Schema::create('custome_fields', function (Blueprint $table) {
              $table->id();
              $table->foreignId('service_id')->constrained('services')->cascadeOnDelete();
              $table->string('label');        
              $table->string('name');         
              $table->string('type');           
              $table->boolean('required')->default(false);
              $table->text('options')->nullable();  // select, Checkbox
              $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custome_fields');
    }
};
