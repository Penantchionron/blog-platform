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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->foreignId('content_id')->constrained('contents')->onDelete('cascade');

                $table->decimal('price', 8, 2);
                $table->enum('payment_method', ['paypal', 'card', 'mobile', 'manual'])->default('paypal');
                $table->string('transaction_id')->nullable();
                $table->timestamp('purchased_at')->useCurrent();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
