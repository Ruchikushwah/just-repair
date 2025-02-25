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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('job_no')->unique()->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('service_on_id')->constrained('service_ons')->onDelete('cascade');
            $table->foreignId('requirement_id')->nullable()->constrained('requirements')->onDelete('cascade');
            $table->date('pref_date');
            $table->time('time');
            $table->string('name')->nullable();
            $table->string('contact_no');
            $table->text('address');
            $table->string('landmark')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('pincode');
            $table->enum('status', ['accept', 'reject', 'process', 'done', 'close'])->default('process');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
