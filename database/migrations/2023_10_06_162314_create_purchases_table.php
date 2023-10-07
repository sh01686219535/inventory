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
            $table->date('date');
            $table->string('purchase_no');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('product_id');
            $table->double('buying_qty');
            $table->double('unit_price');
            $table->text('description');
            $table->double('buying_price');
            $table->tinyInteger('status')->default(0)->comment('0=Pending,1=Approved');
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
