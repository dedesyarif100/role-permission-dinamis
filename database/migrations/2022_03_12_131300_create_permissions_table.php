<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('role_id');
            $table->boolean('user_view');
            $table->boolean('user_create');
            $table->boolean('user_edit');
            $table->boolean('user_delete');
            $table->boolean('menu_view');
            $table->boolean('menu_create');
            $table->boolean('menu_edit');
            $table->boolean('menu_delete');
            $table->boolean('submenu_view');
            $table->boolean('submenu_create');
            $table->boolean('submenu_edit');
            $table->boolean('submenu_delete');
            $table->boolean('content_view');
            $table->boolean('content_create');
            $table->boolean('content_edit');
            $table->boolean('content_delete');
            $table->boolean('aboutus_view');
            $table->boolean('aboutus_create');
            $table->boolean('aboutus_edit');
            $table->boolean('aboutus_delete');
            $table->boolean('slideshow_view');
            $table->boolean('slideshow_create');
            $table->boolean('slideshow_edit');
            $table->boolean('slideshow_delete');
            $table->boolean('service_view');
            $table->boolean('service_create');
            $table->boolean('service_edit');
            $table->boolean('service_delete');
            $table->boolean('trusted_view');
            $table->boolean('trusted_create');
            $table->boolean('trusted_edit');
            $table->boolean('trusted_delete');
            $table->boolean('commentclient_view');
            $table->boolean('commentclient_create');
            $table->boolean('commentclient_edit');
            $table->boolean('commentclient_delete');
            $table->boolean('categorynews_view');
            $table->boolean('categorynews_create');
            $table->boolean('categorynews_edit');
            $table->boolean('categorynews_delete');
            $table->boolean('news_view');
            $table->boolean('news_create');
            $table->boolean('news_edit');
            $table->boolean('news_delete');
            $table->boolean('faq_view');
            $table->boolean('faq_create');
            $table->boolean('faq_edit');
            $table->boolean('faq_delete');
            $table->boolean('contactus_view');
            $table->boolean('contactus_create');
            $table->boolean('contactus_edit');
            $table->boolean('contactus_delete');
            $table->boolean('information_view');
            $table->boolean('information_create');
            $table->boolean('information_edit');
            $table->boolean('information_delete');
            $table->boolean('consultation_view');
            $table->boolean('consultation_create');
            $table->boolean('consultation_edit');
            $table->boolean('consultation_delete');
            $table->boolean('contactour_view');
            $table->boolean('contactour_create');
            $table->boolean('contactour_edit');
            $table->boolean('contactour_delete');
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
        Schema::dropIfExists('permissions');
    }
}
