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
    Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('client_id'); // FK to clients
        $table->string('project_name');
        $table->text('description');
        $table->enum('status', ['ongoing', 'completed']);
        $table->date('end_date')->nullable();
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
        Schema::dropIfExists('projects');
    }
};
