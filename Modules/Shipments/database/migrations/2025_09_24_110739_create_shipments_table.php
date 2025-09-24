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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_number');
            $table->dateTime('shipment_date');
            $table->string('delivery_address');
            $table->string('recipient');
            $table->integer('package_count');
            $table->decimal('total_weight', 8, 2);
            $table->decimal('total_volume', 8, 2);
            $table->decimal('shipping_fee', 8, 2);
            $table->decimal('package_value', 8, 2);
            $table->string('description');
            $table->string('status');
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
