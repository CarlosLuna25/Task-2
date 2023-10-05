<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Migration for add edit field to products, prices, providers 
     * Available/NULL = available to edir
     * Edited = Edited by user
     * in edition = in edition by user
     * 
     * 
     * add editor field for the user who is editing the row
     * 
     */
    public function up(): void
    {
        Schema::table('product', function (Blueprint $table) {
            $table->string('edit')->nullable();
            $table->unsignedBigInteger('editor_id');
        });
        Schema::table('product_price', function (Blueprint $table) {
            $table->string('edit')->nullable();
            $table->unsignedBigInteger('editor_id');
        });
        Schema::table('provider', function (Blueprint $table) {
            $table->string('edit')->nullable();
            $table->unsignedBigInteger('editor_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product',function  (Blueprint $table){
            $table->dropColumn('edit');
            $table->dropColumn('editor_id');

        });
        Schema::table('product_price',function  (Blueprint $table){
            $table->dropColumn('edit');
            $table->dropColumn('editor_id');

        });
        Schema::table('provider',function  (Blueprint $table){
            $table->dropColumn('edit');
            $table->dropColumn('editor_id');

        });
    }
};
