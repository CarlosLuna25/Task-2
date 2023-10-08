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
            $table->unsignedBigInteger('editor_id')->default(0);
        });
        Schema::table('product_price', function (Blueprint $table) {
            $table->string('edit')->nullable();
            $table->unsignedBigInteger('editor_id')->default(0);
        });
        Schema::table('provider', function (Blueprint $table) {
            $table->string('edit')->nullable();
            $table->unsignedBigInteger('editor_id')->default(0);
        });
        Schema::table('inventory', function (Blueprint $table) {
            $table->string('edit')->nullable();
            $table->unsignedBigInteger('editor_id')->default(0);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('product',function  (Blueprint $table){
            if (Schema::hasColumn('product', 'edit')) {
                $table->dropColumn('edit');
            }
            if (Schema::hasColumn('product', 'editor_id')) {
                $table->dropColumn('editor_id');
            }
            

        });
        Schema::table('product_price',function  (Blueprint $table){
            if (Schema::hasColumn('product_price', 'edit')) {
                $table->dropColumn('edit');
            }
            if (Schema::hasColumn('product_price', 'editor_id')) {
                $table->dropColumn('editor_id');
            }

        });
        Schema::table('provider',function  (Blueprint $table){
            if (Schema::hasColumn('provider', 'edit')) {
                $table->dropColumn('edit');
            }
            if (Schema::hasColumn('provider', 'editor_id')) {
                $table->dropColumn('editor_id');
            }

        });
        Schema::table('inventory',function  (Blueprint $table){
            if (Schema::hasColumn('inventory', 'edit')) {
                $table->dropColumn('edit');
            }
            if (Schema::hasColumn('inventory', 'editor_id')) {
                $table->dropColumn('editor_id');
            }

        });
    }
};
