<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('operations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('priority')->nullable()->nullable()->default(1);
            $table->timestamps();
        });

        Schema::create('account_operation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('operation_id')->unsigned()->index();
            $table->integer('account_id')->unsigned()->index();
            $table->string('description')->nullable();
            $table->foreign('operation_id')->references('id')->on('operations')->onDelete('cascade');
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
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
        //
        Schema::dropIfExists('operations');
        Schema::dropIfExists('account_operation');
    }
}
