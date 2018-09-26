<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBountyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bounty', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->index()->comment('Unique identifier string for the Bounty');
            $table->unsignedInteger('type_id')->index()->comment('Foreign key pointing to the Bounty table\'s corresponding row based on current ID');
            $table->string('name')->comment('Bounty Name/Title');
            $table->text('description')->nullable();
            $table->float('reward')->nullable()->default(true)->comment('Refers to the bounty\'s BAKD token reward. NULL value represents NO reward for this bounty');
            $table->float('reward_total')->nullable()->default(true)->comment('Refers to the TOTAL amount of tokens ever potentially claimed using this bounty. Defaults to NULL. A NULL reward_total is equal to UNLIMITED!');
            $table->string('image')->nullable()->comment('Path to the image/logo of the bounty. Relative to the app upload dir');
            $table->timestampTz('start_date')->nullable()->comment('TimeZone Aware Timestamp for when bounty claims will be valid for this bounty. Null "start_date" date time field is equal to a starting immediately');
            $table->timestampTz('end_date')->nullable()->comment('TimeZone Aware Timestamp for when bounty claims for this bounty will become invalid. Null "end_date" date time field is equal to a never ending bounty');
            $table->timestampsTz();     // Handles the automatic Laravel 'created_at' and 'updated_at' fields
            $table->softDeletesTz();    // Handles the internal Laravel 'deleted_at' at soft delete field
            $table->foreign('type_id')->references('id')->on('bounty_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bounty');
    }
}
