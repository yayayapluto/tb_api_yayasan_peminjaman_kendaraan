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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->char('id_booking', 36)->unique();
            $table->integer('id_vehicle')->index('bookings_id_vehicle_foreign');
            $table->integer('id_user')->index('bookings_id_user_foreign');
            $table->integer('id_driver')->index('bookings_id_driver_foreign');
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

            $table->foreign('id_vehicle')->references('id')->on('vehicles')->onDelete('cascade')->name('fk_bookings_id_vehicle');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->name('fk_bookings_id_user');
            $table->foreign('id_driver')->references('id')->on('users')->onDelete('cascade')->name('fk_bookings_id_driver');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('bookings', function (Blueprint $table) {
        //     $table->dropForeign('fk_bookings_id_vehicle');
        //     $table->dropForeign('fk_bookings_id_user');
        //     $table->dropForeign('fk_bookings_id_driver');
        // });

        Schema::dropIfExists('bookings');
    }
};
