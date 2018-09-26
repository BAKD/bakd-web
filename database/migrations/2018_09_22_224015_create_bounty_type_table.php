<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBountyTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bounty_type', function (Blueprint $table) {
            $table->increments('id')->references('type_id')->on('bounty')->onDelete('cascade');;
            $table->uuid('uuid')->index()->comment('Unique identifier string for the Type of Bounty');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable()->comment('Path to the image/logo of the bounty type. Relative to the app upload dir');
            $table->timestampsTz();     // Handles the automatic Laravel 'created_at' and 'updated_at' fields
            $table->softDeletesTz();    // Handles the internal Laravel 'deleted_at' at soft delete field
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bounty_type');
    }
}
