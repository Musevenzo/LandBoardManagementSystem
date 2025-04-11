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
    Schema::create('applications', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->string('full_name')->default("");
        $table->string('omang_number');
        $table->string('status')->default("pending");
        $table->string('ward');
        $table->string('village');
        $table->string('address');
        $table->string('marital_status');
        $table->date('date_of_birth');
        $table->string('location');
        $table->string('spouse_full_name')->nullable();
        $table->string('spouse_omang_number')->nullable();
        $table->boolean('age_declaration')->default(false);
        $table->boolean('plot_ownership')->default(false);
        $table->boolean('never_owned_plot')->default(false);
        $table->boolean('spouse_plot_ownership')->nullable();
        $table->boolean('spouse_never_owned_plot')->nullable();
        $table->string('omang_copy'); // Path to uploaded Omang/ID file
        $table->string('proof_of_payment'); // Path to uploaded proof of payment file
        $table->json('additional_documents')->nullable(); // Array of uploaded additional document paths
        $table->boolean('terms_agreement')->default(false);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
