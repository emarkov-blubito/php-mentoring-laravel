<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('first_order')->nullable();
            $table->datetime('rating_date')->nullable();
            $table->datetime('last_order')->nullable();
            $table->datetime('registration')->nullable();
            $table->datetime('last_modified')->nullable();
            $table->string('address')->nullable();
            $table->string('rating_description')->nullable();
            $table->string('ebilling_mail')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('ta')->nullable();
            $table->string('country_code')->nullable();
            $table->string('rating_indicator')->nullable();
            $table->string('mc_code')->nullable();
            $table->string('ebilling')->nullable();
            $table->string('average_days')->nullable();
            $table->string('phone')->nullable();
            $table->string('customer_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
