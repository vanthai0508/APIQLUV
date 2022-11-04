<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->restrictOnUpdate()
                ->cascadeOnDelete();

        });

        Schema::table('shopping_carts', function ($table) {
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->restrictOnUpdate()
                ->cascadeOnDelete();
        });
        
        Schema::table('shopping_carts', function ($table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->restrictOnUpdate()
                ->cascadeOnDelete();
        });

        Schema::table('shopping_cart_details', function ($table) {
            $table->foreign('shopping_cart_id')
                ->references('id')
                ->on('shopping_carts')
                ->restrictOnUpdate()
                ->cascadeOnDelete();
        });

        Schema::table('shopping_cart_details', function ($table) {
            $table->foreign('fruit_id')
                ->references('id')
                ->on('fruits')
                ->restrictOnUpdate()
                ->cascadeOnDelete();
        });
        
        Schema::table('order_details', function ($table) {
            $table->foreign('fruit_id')
                ->references('id')
                ->on('fruits')
                ->restrictOnUpdate()
                ->cascadeOnDelete();
        });
        
        Schema::table('order_details', function ($table) {
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->restrictOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};