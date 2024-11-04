<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->text('data')->nullable(); // Use 'text' ou 'json' conforme necessário
        });
    }
    
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn('data');
        });
    }
    
};
