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
    Schema::create('private_details', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('client_id'); // FK to clients
        $table->text('private_address');
        $table->string('industry_type');
        $table->timestamps();
        $table->softDeletes();

        $table->foreign('client_id')->references('client_id')->on('clients')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('private_details');
    }
};
