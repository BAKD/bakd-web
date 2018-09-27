<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBountyTables extends Migration
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
            $table->integer('bounty_reward_type_id')->nullable();
        });

        // Reward "Type" Table
        Schema::create('bounty_claim_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->index();
            $table->string('path')->index();
            $table->string('type')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('bounty_claim_id');
            $table->timestampsTz();
        });

        // Reward "Type" Table
        Schema::create('bounty_reward_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestampsTz();
        });

        // Create bounty claim user pivot table
        Schema::create('bounty_claim_user', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->index();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('bounty_claim_id');
            $table->timestampsTz();
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
            $table->dropColumn(['status', 'bounty_reward_type_id']);
        });

        Schema::dropIfExists('bounty_reward_types');
        Schema::dropIfExists('bounty_claim_user');
        Schema::dropIfExists('bounty_claim_attachments');
    }
}
