<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('patronymic');
            $table->string('surname');
            $table->string('avatar_url')->nullable();
            $table->string('birthday');
            $table->string('position');
            $table->string('phone');
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
