<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPointsTable extends Migration
{
    public function up()
    {
        Schema::table('points', function (Blueprint $table) {
            $table->unsignedBigInteger('code_id')->nullable();
            $table->foreign('code_id', 'code_fk_9347651')->references('id')->on('cards');
            $table->unsignedBigInteger('stores_id')->nullable();
            $table->foreign('stores_id', 'stores_fk_9347647')->references('id')->on('stores');
        });
    }
}
