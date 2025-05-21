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
    Schema::create('clients', function (Blueprint $table) {
        $table->id('client_id');
        $table->string('full_name');
        $table->string('title')->nullable();
        $table->enum('customer_type', ['organization', 'private']);
        $table->string('email')->unique();
        $table->string('phone_number');
        $table->enum('gender', ['male', 'female'])->nullable();
        $table->date('birthday')->nullable();
        $table->text('address')->nullable();
        $table->enum('working_location', ['office', 'remote']);
        $table->string('department')->nullable(); // Position
        $table->date('start_date');
        $table->unsignedBigInteger('created_by'); // FK to users
        $table->text('notes')->nullable();
        $table->timestamps();
        $table->softDeletes();

        $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
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
