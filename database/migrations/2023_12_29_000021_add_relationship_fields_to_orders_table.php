<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('stores_id')->nullable();
            $table->foreign('stores_id', 'stores_fk_9347682')->references('id')->on('stores');
            $table->unsignedBigInteger('reward_id')->nullable();
            $table->foreign('reward_id', 'reward_fk_9347683')->references('id')->on('rewards');
            $table->unsignedBigInteger('card_id')->nullable();
            $table->foreign('card_id', 'card_fk_9347684')->references('id')->on('cards');
        });
    }
}
