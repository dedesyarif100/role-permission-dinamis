<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('authors', function (Blueprint $table) {
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('photo_id')->references('id')->on('photos');
            $table->foreign('post_id')->references('id')->on('posts');
        });

        Schema::table('assets', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories_assets');
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->foreign('employee_id')->references('id')->on('employees');
            // $table->foreign('created_by')->references('id')->on('users');
            // $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('logs', function (Blueprint $table) {
            $table->foreign('asset_id')->references('id')->on('assets');
            $table->foreign('employee_id')->references('id')->on('employees');
        });

        Schema::table('books', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('publisher_id')->references('id')->on('publishers');
            $table->foreign('genre_id')->references('id')->on('genre');
        });

        Schema::table('content', function (Blueprint $table) {
            $table->foreign('menu_id')->references('id')->on('menu');
            $table->foreign('sub_menu_id')->references('id')->on('sub_menu');
        });

        Schema::table('commentables', function (Blueprint $table) {
            $table->foreign('comment_id')->references('id')->on('comments');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('post_id')->references('id')->on('posts');
        });

        Schema::table('menuables', function (Blueprint $table) {
            $table->foreign('menu_id')->references('id')->on('menu');
        });

        Schema::table('news', function (Blueprint $table) {
            $table->foreign('category_news_id')->references('id')->on('category_news');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('photos', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('post_id')->references('id')->on('posts');
        });

        Schema::table('role_permission', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('permission_id')->references('id')->on('permissions');
        });

        Schema::table('sub_menu', function (Blueprint $table) {
            $table->foreign('menu_id')->references('id')->on('menu');
        });

        Schema::table('tags', function (Blueprint $table) {
            $table->foreign('photo_id')->references('id')->on('photos');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('account_id')->references('id')->on('accounts');
        });

        Schema::table('user_permission', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('permission_id')->references('id')->on('permissions');
        });

        Schema::table('user_roles', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign('book_id');
        });

        Schema::table('photos', function (Blueprint $table) {
            $table->dropForeign('photo_id');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('post_id');
        });
    }
}
