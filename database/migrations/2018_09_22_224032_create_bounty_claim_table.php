<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBountyClaimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bounty_claim', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->index()->comment('Unique identifier string for the Bounty Claim');
            $table->unsignedInteger('user_id')->index()->comment('Foreign key pointing to user table of the person claiming the bounty.');
            $table->unsignedInteger('bounty_id')->index()->comment('Foreign key pointing to the bounty that is being claimed');
            $table->unsignedInteger('confirmed_by_id')->index()->comment('Foreign key pointing to the user table row of the administrator who verified/confirmed this bounty claim.');
            $table->boolean('confirmed')->default(false)->comment('Has this bounty claim request been verified?');
            $table->text('description')->nullable()->comment('Claim description -- optional field');
            $table->timestampsTz();     // Handles the automatic Laravel 'created_at' and 'updated_at' fields
            $table->softDeletesTz();    // Handles the internal Laravel 'deleted_at' at soft delete field
            $table->foreign('bounty_id')->references('id')->on('bounty');
            $table->foreign('confirmed_by_id')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bounty_claim');
    }
}
