<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->string('code')->unique();
            $table->string('name');
            $table->bigInteger('vendor_id')->unsigned();
            $table->bigInteger('quantity');
            $table->datetime('buy_at')->default(now());
            $table->boolean('has_item')->default(false);
            $table->string('type')->default('10');
            $table->bigInteger('employee_id')->unsigned()->nullable();
            $table->boolean('status')->default(true);
            $table->string('notes')->nullable();
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned();
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
        Schema::dropIfExists('assets');
    }
}
