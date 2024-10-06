<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('id_user')->unique();
            $table->string('name', 255);
            $table->string('password', 255);
            $table->integer('level');
            $table->boolean('is_enable');
            $table->timestamps();
            $table->string('created_by', 255)->nullable();
            $table->string('updated_by', 255)->nullable();
            $table->softDeletes();
            $table->string('deleted_by', 255)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
