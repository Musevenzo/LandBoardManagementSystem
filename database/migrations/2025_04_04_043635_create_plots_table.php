<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('plots', function (Blueprint $table) {
            $table->id();
            $table->string('plot_number')->unique(); // Ensure this column is defined
            $table->string('location');
            $table->integer('size');
            $table->string('status');
            $table->unsignedBigInteger('user_id')->default(0)->nullable(); // Allow NULL values if optional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::dropIfExists('plots');
}
};
