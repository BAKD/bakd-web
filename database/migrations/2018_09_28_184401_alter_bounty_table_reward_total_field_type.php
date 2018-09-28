<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBountyTableRewardTotalFieldType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Ugly but works.
        DB::statement('ALTER TABLE bounty MODIFY reward BIGINT UNSIGNED DEFAULT 0;');
        DB::statement('ALTER TABLE bounty MODIFY reward_total BIGINT UNSIGNED DEFAULT 0;');

        // TODO: Doctrine wont handle this change simply because of the existing enum on the previously
        // defined table structure.
        // Schema::table('bounty', function (Blueprint $table) {
        //     $table->unsignedBigInteger('reward')->nullable()->default(0)->change();
        //     $table->unsignedBigInteger('reward_total')->nullable()->default(0)->change();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE bounty MODIFY reward FLOAT NULL DEFAULT TRUE;');
        DB::statement('ALTER TABLE bounty MODIFY reward_total FLOAT NULL DEFAULT TRUE;');

        // Migration wont run, even using Dbal, because of the enum column we have.
        // Schema::table('bounty', function (Blueprint $table) {
        //     $table->float('reward')->nullable()->default(true)->comment('Refers to the bounty\'s BAKD token reward. NULL value represents NO reward for this bounty');
        //     $table->float('reward_total')->nullable()->default(true)->comment('Refers to the TOTAL amount of tokens ever potentially claimed using this bounty. Defaults to NULL. A NULL reward_total is equal to UNLIMITED!');
        // });
    }
}
