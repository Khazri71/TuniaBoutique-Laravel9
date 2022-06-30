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
        Schema::create('orders', function (Blueprint $table) {
            //Ordre
            $table->id();
            
            //Utilisatur
            $table->string('user_name')->nullable();
            $table->string('user_lastname')->nullable();
            $table->string('user_phone')->nullable();
            $table->string('user_address')->nullable();
            $table->string('user_email')->nullable();
            //Produit
            $table->string('product_name')->nullable();
            $table->string('product_description')->nullable();
            $table->string('product_quantity')->nullable();
            $table->double('product_price')->nullable();
            $table->string('product_image')->nullable();
            $table->string('product_category_name')->nullable();

            $table->string('user_id')->nullable();
            $table->string('product_id')->nullable();
            
            //état de paiment
            $table->string('payement_status')->nullable();
            //état de livraison
            $table->string('delivery_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
