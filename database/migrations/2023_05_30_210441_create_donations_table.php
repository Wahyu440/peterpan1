<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->integer('activity_id');
            $table->string('donor_username');
            $table->bigInteger('cash_nominal')->nullable();
            $table->string('item_name')->nullable();
            $table->integer('item_quantity')->nullable();
            $table->bigInteger('item_nominal')->nullable();
            $table->bigInteger('total_donation');
            $table->string('payment')->nullable();
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
        Schema::dropIfExists('donations');
    }
};
