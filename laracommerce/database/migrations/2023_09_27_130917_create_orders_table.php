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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('tracking_no');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('pincode');
            $table->mediumText('address');
            $table->string('status_message');
            $table->enum('payment_type',['0','1'])->comment('0=>Cash on Delivery : 1=>Online Payment');
            $table->integer('payment_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
