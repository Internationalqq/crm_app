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
            $table->boolean('status')->default(0); // Статус
            $table->date('due_date'); // Крайний срок
            $table->string('manager'); // Менеджер
            $table->string('order_type'); // Тип заказа
            $table->string('device_type'); // Тип устройства
            $table->string('device'); // Устройство
            $table->string('issue'); // Неисправность
            $table->unsignedBigInteger('contractor_id')->default(0)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('user_order_id')->nullable();
            $table->decimal('amount', 10, 2); // Сумма
            $table->timestamps();
            $table->softDeletes();
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
