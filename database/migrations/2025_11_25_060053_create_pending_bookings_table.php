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
       
            Schema::create('pending_bookings', function (Blueprint $table) {
                $table->id();

                $table->unsignedBigInteger('event_id');
                $table->unsignedBigInteger('ticket_id');
                $table->string('paypal_order_id')->nullable();

                $table->string('name');
                $table->string('email')->nullable();
                $table->string('phone_no');
                $table->enum('gender', ['male', 'female', 'other'])->nullable();

                $table->json('extra_data')->nullable();
                $table->decimal('donation_amount', 10, 2)->default(0.00);

                $table->string('payment_gateway');
                $table->string('payment_method_id')->nullable();

                $table->timestamps();

                // Foreign keys
                $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
                $table->foreign('ticket_id')->references('id')->on('event_tickets')->onDelete('cascade');
            });
     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pending_bookings');
    }
};
