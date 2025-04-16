<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlotNumberToPlotsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('plots', function (Blueprint $table) {
            $table->string('plot_number')->after('id')->unique(); // Add the plot_number column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('plots', function (Blueprint $table) {
            $table->dropColumn('plot_number'); // Remove the plot_number column
        });
    }
}