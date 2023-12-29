<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCustomersTable extends Migration
{
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->unsignedBigInteger('card_id')->nullable();
            $table->foreign('card_id', 'card_fk_9347711')->references('id')->on('cards');
            $table->unsignedBigInteger('stores_id')->nullable();
            $table->foreign('stores_id', 'stores_fk_9347712')->references('id')->on('stores');
        });
    }
}
