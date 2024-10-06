<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('id_booking', 36)->unique();
            $table->char('id_vehicle', 36)->index('bookings_id_vehicle_foreign');
            $table->string('id_user')->index('bookings_id_user_foreign');
            $table->string('id_driver')->index('bookings_id_driver_foreign');
            $table->string('driver_name');
            $table->enum('service', ['internal', 'external']);
            $table->string('image');
            $table->string('from_address');
            $table->decimal('from_lon', 10, 7);
            $table->decimal('from_lat', 10, 7);
            $table->string('to_address');
            $table->decimal('to_lon', 10, 7);
            $table->decimal('to_lat', 10, 7);
            $table->enum('status', ['new', 'apr', 'rej']);
            $table->timestamps();
            $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
