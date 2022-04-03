<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_news', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('title');
            $table->string('content')->nullable();
            $table->bigInteger('menunews_id')->nullable()->unsigned();
            $table->string('menunews_type')->nullable();
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
        Schema::dropIfExists('menu_news');
    }
}
