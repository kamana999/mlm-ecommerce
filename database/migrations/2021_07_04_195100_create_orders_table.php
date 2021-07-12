<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->boolean('ordered');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('address_id')->nullable()->constrained('addresses')->onDelete('cascade');
            $table->foreignId('coupon_id')->nullable()->constrained('coupons')->onDelete('cascade');
            $table->foreignId('delivery_boy_id')->nullable()->constrained('delivery_persons')->onDelete('cascade');
            $table->string('delivery_type')->nullable();
            $table->string('delivery_charge')->nullable();
            $table->string('area')->nullable();
            $table->boolean('isPending')->default(false);
            $table->boolean('isConfirm')->default(false);
            $table->boolean('isCancle')->default(false);
            $table->boolean('outForDelivery')->default(false);
            $table->boolean('orderCompleted')->default(false);
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
}
