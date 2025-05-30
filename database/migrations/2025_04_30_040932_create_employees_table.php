<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('Employees', function (Blueprint $table) {
        $table->id();
        $table->string('full_name');
        $table->string('gender');
        $table->string('email')->unique();
        $table->string('phone_number');
        $table->text('address');
        $table->string('department')->nullable(); // Nullable for "No department yet"
        $table->timestamps();
        $table->softDeletes();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
