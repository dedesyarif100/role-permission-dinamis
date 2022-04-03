<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->dateTime('date');
            $table->bigInteger('asset_id')->unsigned();
            $table->string('type');
            $table->bigInteger('employee_id')->unsigned()->nullable();
            $table->bigInteger('qty_in');
            $table->bigInteger('qty_out');
            $table->string('notes')->nullable();
            $table->json('jsoncolumn')->nullable();
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
        Schema::dropIfExists('logs');
    }
}
