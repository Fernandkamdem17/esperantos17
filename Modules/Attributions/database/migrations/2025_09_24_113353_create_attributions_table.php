<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Actors\Models\Actor;
use Modules\Shipments\Models\Shipment;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attributions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Actor::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Shipment::class)->constrained()->onDelete('cascade');
            $table->dateTime('attribution_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributions');
    }
};
