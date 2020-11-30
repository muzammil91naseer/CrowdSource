<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) 
        {
            $table->bigInteger("target_amount")->nullable()->change();
            $table->integer("equity_percentage")->nullable()->change();
            $table->bigInteger("pre_monthly_valuation")->nullable()->change();
            $table->integer("share_price")->nullable()->change();
            $table->string("campaign_end_date")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
