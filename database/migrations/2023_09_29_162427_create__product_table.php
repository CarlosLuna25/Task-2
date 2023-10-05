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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('group_id');
            $table->string('title');
            $table->string('description');
            $table->string('sku');
            $table->timestamps();

            $table->foreign('provider_id')
            ->references('id')->on('provider')->onDelete('cascade');
            $table->foreign('store_id')
            ->references('id')->on('provider_store')->onDelete('cascade');
            $table->foreign('group_id')
            ->references('id')->on('product_group')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_product');
    }
};
