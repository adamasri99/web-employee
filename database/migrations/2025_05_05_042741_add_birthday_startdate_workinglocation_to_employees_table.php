<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->date('birthday')->nullable()->after('department');
            $table->date('start_date')->nullable()->after('birthday');
            $table->string('working_location')->nullable()->after('start_date'); // e.g. 'Remote' or 'Office'
        });
    }
    
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn(['birthday', 'start_date', 'working_location']);
        });
    }
    
};
