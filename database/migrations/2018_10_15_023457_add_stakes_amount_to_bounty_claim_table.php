<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStakesAmountToBountyClaimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bounty_claim', function (Blueprint $table) {
            $table->unsignedBigInteger('stakes_received')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bounty_claim', function (Blueprint $table) {
            $table->dropColumn('stakes_received');
        });
    }
}
