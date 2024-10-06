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
        Schema::table('bookings', function (Blueprint $table) {
            $table->foreign(['id_driver'])->references(['id_user'])->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_user'])->references(['id_user'])->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_vehicle'])->references(['id_vehicle'])->on('vehicles')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign('bookings_id_driver_foreign');
            $table->dropForeign('bookings_id_user_foreign');
            $table->dropForeign('bookings_id_vehicle_foreign');
        });
    }
};
