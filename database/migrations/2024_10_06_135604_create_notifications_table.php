<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id')->index('notifications_booking_id_foreign');
            $table->unsignedBigInteger('user_id')->index('notifications_user_id_foreign');
            $table->unsignedBigInteger('admin_id')->index('notifications_admin_id_foreign');
            $table->enum('status', ['new', 'apr', 'rej']);
            $table->string('message', 255);
            $table->boolean('is_read')->default(false);
            $table->timestamps();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->softDeletes();
            $table->string('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
