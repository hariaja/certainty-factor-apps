<?php

use App\Helpers\Enums\GenderType;
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
    Schema::create('clients', function (Blueprint $table) {
      $table->id();
      $table->string('uuid');
      $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
      $table->string('phone')->unique();
      $table->enum('gender', GenderType::toArray());
      $table->string('place_of_birth')->nullable();
      $table->date('date_of_birth')->nullable();
      $table->string('occupation')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('clients');
  }
};
