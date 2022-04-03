<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentables', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('comment_id')->nullable()->unsigned();
            $table->bigInteger('commentable_id')->nullable()->unsigned();
            $table->string('commentable_type')->nullable();
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
        Schema::dropIfExists('commentables');
    }
}
