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
    Schema::create('organization_details', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('client_id'); // FK to clients
        $table->string('company_name');
        $table->text('company_address');
        $table->string('registration_number');
        $table->string('industry_type');
        $table->timestamps();
        $table->softDeletes();

        // Set the foreign key
        $table->foreign('client_id')->references('client_id')->on('clients')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_details');
    }
};
