<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('documents');
    }

    public function down(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            // Defina os campos conforme a estrutura original ou desejada
            $table->timestamps();
        });
    }
};
