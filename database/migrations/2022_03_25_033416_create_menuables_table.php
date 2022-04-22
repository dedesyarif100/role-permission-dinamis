<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menuables', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('menu_id')->nullable()->unsigned();
            $table->bigInteger('menuables_id')->nullable()->unsigned();
            $table->string('menuables_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menuables');
    }
}
