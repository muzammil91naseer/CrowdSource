<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->text("description")->nullable();
            $table->text("features")->nullable();
            $table->bigInteger("raised_amount")->nullable();
            $table->integer("total_investors")->default(0);
            $table->bigInteger("target_amount");
            $table->integer("equity_percentage");
            $table->bigInteger("pre_monthly_valuation");
            $table->integer("share_price");
            $table->text("idea")->nullable();
            $table->text("team")->nullable();
            $table->string("campaign_end_date");
            $table->string("cover_photo_url")->nullable();
            $table->string("profile_photo_url")->nullable();
            $table->string("team_photo_url")->nullable();
            $table->string("idea_video_url")->nullable();
            $table->boolean("is_active")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
