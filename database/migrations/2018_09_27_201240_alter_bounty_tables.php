<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBountyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Alter bounty table
        Schema::table('bounty', function (Blueprint $table) {
            $table->enum('status', [
                'ACTIVE',
                'PAUSED',
                'PENDING',
                'COMPLETED',
                'FAILED'
                ])->default('PENDING')->comment('Get the manually "admin" applied bounty status, not related to start/end dates.');
            $table->integer('reward_type_id')->nullable();
        });

        // Alter bounty table
        Schema::table('bounty_claim', function (Blueprint $table) {
            $table->
        });

        // Reward "Type" Table
        Schema::create('reward_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
        });

        // Create bounty claim user pivot table
        Schema::create('bounty_claim_user', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->integer('user_id');
            $table->integer('bounty_claim_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bounty', function (Blueprint $table) {
            $table->dropColumn(['status', 'reward_type_id']);
        });

        Schema::dropIfExists('reward_type');
        Schema::dropIfExists('bounty_claim_user');
    }
}
