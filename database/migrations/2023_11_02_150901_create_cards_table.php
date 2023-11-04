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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('part')->nullable();
            $table->string('model')->nullable();
            $table->string('date_of_start')->nullable();
            $table->string('weight')->nullable();
            $table->string('maker')->nullable();
            $table->string('drg_no')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('supplier')->nullable();
            $table->string('inst_bk_no')->nullable();
            $table->string('power')->nullable();
            $table->string('mfg_order_no')->nullable();
            $table->string('maintenance_bk_no')->nullable();
            $table->string('control_voltage')->nullable();
            $table->string('purchase_order_no')->nullable();
            $table->string('capacity')->nullable();
            $table->string('total_amperage')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('material')->nullable();
            $table->string('additional_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
